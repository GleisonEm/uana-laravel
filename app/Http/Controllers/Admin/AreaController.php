<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\AreaFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Area;
use Dompdf\Dompdf;
use Auth;
use Alert;

class AreaController extends Controller
{
    private $totalPage = 10;

    ######################################################################################
    ##                         TELA DE ÁREAS DE CONHECIMENTO                            ##
    ######################################################################################
    public function index()
    {
        $title = 'Listagem de Áreas de Conhecimento';
        $areas = Area::orderBy('name', 'asc')->paginate($this->totalPage);

        return view('painel.cadastros.areas.index', compact('title', 'areas'));
    }

    ######################################################################################
    ##                         CADASTRAR ÁREA DE CONHECIMENTO                           ##
    ######################################################################################
    public function store(AreaFormRequest $request)
    {
        $area = new Area;
        $area->name = $request->name;
        $area->save();

        if ($area)
            Alert::success('Área de conhecimento cadastrada');
        else
            Alert::error('Erro ao cadastrar área de conhecimento');

        return redirect()->route('areas.index');
    }

    ######################################################################################
    ##                           ALTERAR ÁREA DE CONHECIMENTO                           ##
    ######################################################################################
    public function update(AreaFormRequest $request, $id)
    {
        $area = Area::findOrFail($id);
        $area->name = $request->name;
        $area->save();

        if ($area)
            Alert::success('Área de conhecimento alterada');
        else
            Alert::error('Erro ao alterar área de conhecimento');

        return back();
    }

    ######################################################################################
    ##                           EXCLUIR ÁREA DE CONHECIMENTO                           ##
    ######################################################################################
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        if ($area)
            Alert::success('Área de conhecimento excluída');
        else
            Alert::error('Erro ao excluir área de conhecimento');

        return back();
    }

    ######################################################################################
    ##                         PESQUISAR ÁREA DE CONHECIMENTO                           ##
    ######################################################################################
    public function areas_search(Request $request, Area $area)
    {
        $title = 'Listagem de Áreas de Conhecimento';

        $dataForm = $request->all();
        $areas = $area->search($dataForm, $this->totalPage);

        if ($request->pesquisa == 'Sim')
            return redirect($request->url() . '?texto=' . $request->get('texto', 1) . '&page=1');
        else
            return view('painel.cadastros.areas.index', compact('title', 'areas'));
    }

    ######################################################################################
    ##                          IMPRIMIR ÁREAS DE CONHECIMENTO                          ##
    ######################################################################################
    public function areas_pdf(Request $request, Area $area)
    {
        $title = 'Listagem de Áreas de Conhecimento';

        $dataForm = $request->all();
        $areas = $area->search($dataForm, null);

        $total = $areas->count();
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('painel.cadastros.areas.pdf', compact('title', 'areas', 'total')));
        $dompdf->setPaper('A4');
        $dompdf->render();
        $font = $dompdf->getFontMetrics()->get_font("helvetica"); //, "bold"
        $dompdf->getCanvas()->page_text(25, 820, "Impresso por: " . Auth::user()->name, $font, 8, array(0, 0, 0));
        $dompdf->getCanvas()->page_text(500, 825, "Página: {PAGE_NUM} de {PAGE_COUNT}", $font, 8, array(0, 0, 0));
        $dompdf->stream("areas.pdf", array("Attachment" => false));
    }
}
