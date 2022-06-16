<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Dompdf\Dompdf;
use Auth;
use Alert;

class PermissionController extends Controller
{
    private $totalPage = 10;

    ######################################################################################
    ##                             TELA DE PERMISSÕES                                   ##
    ######################################################################################
    public function index()
    {
        $title = 'Listagem de Permissões';
        $permissions = Permission::orderBy('name', 'asc')->paginate($this->totalPage);

        return view('painel.administrador.permissions.index', compact('title', 'permissions'));
    }

    ######################################################################################
    ##                             CADASTRAR PERMISSÃO                                  ##
    ######################################################################################
    public function store(permissionFormRequest $request)
    {
        $permission = new Permission;
        $permission->name = $request->name;
        $permission->description = $request->description;
        $permission->save();

        if ($permission)
            Alert::success('Permissão cadastrada');
        else
            Alert::error('Erro ao cadastrar permissão');

        return redirect()->route('permissions.index');
    }

    ######################################################################################
    ##                             ATUALIZAR PERMISSÃO                                  ##
    ######################################################################################
    public function update(permissionFormRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->description = $request->description;
        $permission->save();

        if ($permission)
            Alert::success('Permissão alterada');
        else
            Alert::error('Erro ao alterar permissão');

        return back();
    }

    ######################################################################################
    ##                               EXCLUIR PERMISSÃO                                  ##
    ######################################################################################
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        if ($permission)
            Alert::success('Permissão excluída');
        else
            Alert::error('Erro ao excluir permissão');

        return back();
    }

    ######################################################################################
    ##                             PESQUISAR PERMISSÃO                                  ##
    ######################################################################################
    public function permissions_search(Request $request, Permission $permission)
    {
        $title = 'Listagem de Permissões';

        $dataForm = $request->all();
        $permissions = $permission->search($dataForm, $this->totalPage);

        if ($request->pesquisa == 'Sim')
            return redirect($request->url() . '?texto=' . $request->get('texto', 1) . '&page=1');
        else
            return view('painel.administrador.permissions.index', compact('title', 'permissions'));
    }

    ######################################################################################
    ##                             IMPRIMIR PERMISSÕES                                  ##
    ######################################################################################
    public function permissions_pdf(Request $request, Permission $permission)
    {
        $title = 'Listagem de Permissões';

        $dataForm = $request->all();
        $permissions = $permission->search($dataForm, null);

        $total = $permissions->count();
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('painel.administrador.permissions.pdf', compact('title', 'permissions', 'total')));
        $dompdf->setPaper('A4');
        $dompdf->render();
        $font = $dompdf->getFontMetrics()->get_font("helvetica"); //, "bold"
        $dompdf->getCanvas()->page_text(25, 820, "Impresso por: " . Auth::user()->name, $font, 8, array(0, 0, 0));
        $dompdf->getCanvas()->page_text(500, 825, "Página: {PAGE_NUM} de {PAGE_COUNT}", $font, 8, array(0, 0, 0));
        $dompdf->stream("permissions.pdf", array("Attachment" => false));
    }
}
