<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\AssignmentFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Dompdf\Dompdf;
use Auth;
use Alert;

class AssignmentController extends Controller
{
    private $totalPage = 10;

    ######################################################################################
    ##                         TELA DE FUNÇÕES                                          ##
    ######################################################################################
    public function index()
    {
        $title = 'Listagem de Funções';
        $assignments = Assignment::orderBy('name', 'asc')->paginate($this->totalPage);

        return view('painel.cadastros.assignments.index', compact('title', 'assignments'));
    }

    ######################################################################################
    ##                         CADASTRAR FUNÇÃO                                         ##
    ######################################################################################
    public function store(AssignmentFormRequest $request)
    {
        $assignment = new Assignment;
        $assignment->name = $request->name;
        $assignment->key = strtoupper($request->key);
        $assignment->save();

        if ($assignment)
            Alert::success('Função cadastrada');
        else
            Alert::error('Erro ao cadastrar função');

        return redirect()->route('assignments.index');
    }

    ######################################################################################
    ##                           ALTERAR FUNÇÃO                                         ##
    ######################################################################################
    public function update(AssignmentFormRequest $request, $id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->name = $request->name;
        $assignment->key = strtoupper($request->key);
        $assignment->save();

        if ($assignment)
            Alert::success('Função alterada');
        else
            Alert::error('Erro ao alterar função');

        return back();
    }

    ######################################################################################
    ##                           EXCLUIR FUNÇÃO                                         ##
    ######################################################################################
    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();

        if ($assignment)
            Alert::success('Função excluída');
        else
            Alert::error('Erro ao excluir função');

        return back();
    }

    ######################################################################################
    ##                         PESQUISAR FUNÇÃO                                         ##
    ######################################################################################
    public function assignments_search(Request $request, Assignment $assignment)
    {
        $title = 'Listagem de Funções';

        $dataForm = $request->all();
        $assignments = $assignment->search($dataForm, $this->totalPage);

        if ($request->pesquisa == 'Sim')
            return redirect($request->url() . '?texto=' . $request->get('texto', 1) . '&page=1');
        else
            return view('painel.cadastros.assignments.index', compact('title', 'assignments'));
    }

    ######################################################################################
    ##                          IMPRIMIR FUNÇÕES                                        ##
    ######################################################################################
    public function assignments_pdf(Request $request, Assignment $assignment)
    {
        $title = 'Listagem de Funções';

        $dataForm = $request->all();
        $assignments = $assignment->search($dataForm, null);

        $total = $assignments->count();
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('painel.cadastros.assignments.pdf', compact('title', 'assignments', 'total')));
        $dompdf->setPaper('A4');
        $dompdf->render();
        $font = $dompdf->getFontMetrics()->get_font("helvetica"); //, "bold"
        $dompdf->getCanvas()->page_text(25, 820, "Impresso por: " . Auth::user()->name, $font, 8, array(0, 0, 0));
        $dompdf->getCanvas()->page_text(500, 825, "Página: {PAGE_NUM} de {PAGE_COUNT}", $font, 8, array(0, 0, 0));
        $dompdf->stream("assignments.pdf", array("Attachment" => false));
    }
}
