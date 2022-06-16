<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\InstituteFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Institute;
use Dompdf\Dompdf;
use Auth;
use Alert;

class InstituteController extends Controller
{
    private $totalPage = 10;

    ######################################################################################
    ##                         TELA DE INSTITUIÇÃO                                      ##
    ######################################################################################
    public function index()
    {
        $title = 'Listagem de Instituições';
        $institutes = Institute::orderBy('name', 'asc')->paginate($this->totalPage);

        return view('painel.cadastros.institutes.index', compact('title', 'institutes'));
    }

    ######################################################################################
    ##                         CADASTRAR INSTITUIÇÃO                                    ##
    ######################################################################################
    public function store(InstituteFormRequest $request)
    {
        $institute = new Institute;
        $institute->name = $request->name;
        $institute->save();

        if ($institute)
            Alert::success('Instituição cadastrada');
        else
            Alert::error('Erro ao cadastrar instituição');

        return redirect()->route('institutes.index');
    }

    ######################################################################################
    ##                           ALTERAR INSTITUIÇÃO                                    ##
    ######################################################################################
    public function update(InstituteFormRequest $request, $id)
    {
        $institute = Institute::findOrFail($id);
        $institute->name = $request->name;
        $institute->save();

        if ($institute)
            Alert::success('Instituição alterada');
        else
            Alert::error('Erro ao alterar instituição');

        return back();
    }

    ######################################################################################
    ##                           EXCLUIR INSTITUIÇÃO                                    ##
    ######################################################################################
    public function destroy($id)
    {
        $institute = Institute::findOrFail($id);
        $institute->delete();

        if ($institute)
            Alert::success('Instituição excluída');
        else
            Alert::error('Erro ao excluir instituição');

        return back();
    }

    ######################################################################################
    ##                         PESQUISAR INSTITUIÇÃO                                    ##
    ######################################################################################
    public function institutes_search(Request $request, Institute $institute)
    {
        $title = 'Listagem de Instituições';

        $dataForm = $request->all();
        $institutes = $institute->search($dataForm, $this->totalPage);

        if ($request->pesquisa == 'Sim')
            return redirect($request->url() . '?texto=' . $request->get('texto', 1) . '&page=1');
        else
            return view('painel.cadastros.institutes.index', compact('title', 'institutes'));
    }

    ######################################################################################
    ##                          IMPRIMIR INSTITUIÇÕES                                   ##
    ######################################################################################
    public function institutes_pdf(Request $request, Institute $institute)
    {
        $title = 'Listagem de Instituições';

        $dataForm = $request->all();
        $institutes = $institute->search($dataForm, null);

        $total = $institutes->count();
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('painel.cadastros.institutes.pdf', compact('title', 'institutes', 'total')));
        $dompdf->setPaper('A4');
        $dompdf->render();
        $font = $dompdf->getFontMetrics()->get_font("helvetica"); //, "bold"
        $dompdf->getCanvas()->page_text(25, 820, "Impresso por: " . Auth::user()->name, $font, 8, array(0, 0, 0));
        $dompdf->getCanvas()->page_text(500, 825, "Página: {PAGE_NUM} de {PAGE_COUNT}", $font, 8, array(0, 0, 0));
        $dompdf->stream("institutes.pdf", array("Attachment" => false));
    }
}
