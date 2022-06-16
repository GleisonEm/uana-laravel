<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\TeamFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Team_User;
use Dompdf\Dompdf;
use Auth;
use Alert;

class TeamController extends Controller
{
    private $totalPage = 10;

    ######################################################################################
    ##                         TELA DE TURMAS                                           ##
    ######################################################################################
    public function index()
    {
        $title = 'Listagem de Turmas';

        if (Auth::user()->assignment_id == 1) {
            $teams = Team::orderBy('name', 'asc')
                ->paginate($this->totalPage);
        } else {
            $teams = Team::orderBy('name', 'asc')
                ->where('user_id', Auth::user()->id)
                ->paginate($this->totalPage);
        }

        $coursesForSelect = Team::coursesForSelect();

        return view('painel.cadastros.teams.index', compact('title', 'teams', 'coursesForSelect'));
    }

    ######################################################################################
    ##                         CADASTRAR TURMA                                          ##
    ######################################################################################
    public function store(TeamFormRequest $request)
    {
        $team = new Team;
        $team->name = $request->name;
        $team->institute_id = Auth::user()->institute_id;
        $team->user_id = Auth::user()->id;
        $team->course_id = $request->course_id;
        $team->key = strtoupper(substr(md5(date("YmdHis")), 1, 7));
        $team->save();

        if ($team)
            Alert::success('Turma cadastrada');
        else
            Alert::error('Erro ao cadastrar turma');

        return redirect()->route('teams.index');
    }

    ######################################################################################
    ##                           ALTERAR TURMA                                          ##
    ######################################################################################
    public function update(TeamFormRequest $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->name = $request->name;
        $team->institute_id = Auth::user()->institute_id;
        if (Auth::user()->assignment_id != 1) {
            $team->user_id = Auth::user()->id;
        }
        $team->course_id = $request->course_id;
        $team->save();

        if ($team)
            Alert::success('Turma alterada');
        else
            Alert::error('Erro ao alterar turma');

        return back();
    }

    ######################################################################################
    ##                           EXCLUIR TURMA                                          ##
    ######################################################################################
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        if ($team)
            Alert::success('Turma excluída');
        else
            Alert::error('Erro ao excluir turma');

        return back();
    }

    ######################################################################################
    ##                         PESQUISAR TURMA                                          ##
    ######################################################################################
    public function teams_search(Request $request, Team $team)
    {
        $title = 'Listagem de Turmas';

        $dataForm = $request->all();
        $teams = $team->search($dataForm, $this->totalPage);
        $coursesForSelect = Team::coursesForSelect();

        if ($request->pesquisa == 'Sim')
            return redirect($request->url() . '?texto=' . $request->get('texto', 1) . '&page=1');
        else
            return view('painel.cadastros.teams.index', compact('title', 'teams', 'coursesForSelect'));
    }

    ######################################################################################
    ##                          IMPRIMIR TURMAS                                         ##
    ######################################################################################
    public function teams_pdf(Request $request, Team $team)
    {
        $title = 'Listagem de Turmas';

        $dataForm = $request->all();
        $teams = $team->search($dataForm, null);

        $total = $teams->count();
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('painel.cadastros.teams.pdf', compact('title', 'teams', 'total')));
        $dompdf->setPaper('A4');
        $dompdf->render();
        $font = $dompdf->getFontMetrics()->get_font("helvetica"); //, "bold"
        $dompdf->getCanvas()->page_text(25, 820, "Impresso por: " . Auth::user()->name, $font, 8, array(0, 0, 0));
        $dompdf->getCanvas()->page_text(500, 825, "Página: {PAGE_NUM} de {PAGE_COUNT}", $font, 8, array(0, 0, 0));
        $dompdf->stream("teams.pdf", array("Attachment" => false));
    }

    ######################################################################################
    ##                          INCLUIR USUÁRIO NA TURMA                                ##
    ######################################################################################
    public function team_user(Request $request)
    {
        $team = Team::orderBy('name', 'asc')
            ->where('institute_id', Auth::user()->institute_id)
            ->where('key', $request->key)
            ->first();

        if ($team == null) {
            Alert::error('A turma não existe !');
        } else {

            $team1 = Team_User::orderBy('team_id', 'asc')
                ->where('team_id', $team->id)
                ->where('user_id', Auth::user()->id)
                ->first();
            if ($team1 != null) {
                Alert::error('Já está na turma !');
            } else {
                $team2 = new Team_User;
                $team2->team_id = $team->id;
                $team2->user_id = Auth::user()->id;
                $team2->save();

                if ($team2)
                    Alert::success('Inserido na turma');
                else
                    Alert::error('Erro ao inserir na turma');
            }
        }

        return back();
    }

    ### TELA DE ALUNOS DA TURMA ---------------------------------------------------------------
    public function alunos_index($team_id)
    {
        $team_users = Team_User::orderBy('team_id', 'asc')
            ->where('team_id', $team_id)
            ->paginate(100);

        $title = 'Turma: ' . Team_User::retorna_turma($team_id);


        return view('painel._comuns.alunos.index', compact('title', 'team_users', 'team_id'));
    }
}
