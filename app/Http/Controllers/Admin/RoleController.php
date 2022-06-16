<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\RoleFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Dompdf\Dompdf;
use Auth;
use Alert;

class RoleController extends Controller
{
    private $totalPage = 10;

    ######################################################################################
    ##                                TELA DE PERFIS                                    ##
    ######################################################################################
    public function index()
    {
        $title = 'Listagem de Perfis';
        $roles = Role::orderBy('name', 'asc')->paginate($this->totalPage);
        $permissionsForSelect = Role::permissionsForSelect();

        return view('painel.administrador.roles.index', compact('title', 'roles', 'permissionsForSelect'));
    }

    ######################################################################################
    ##                                CADASTRAR PERFIL                                  ##
    ######################################################################################
    public function store(RoleFormRequest $request)
    {
        $role = new Role;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        if ($request->permissions)
            $role->permissions()->sync($request->permissions);
        else
            $role->permissions()->detach();

        if ($role)
            Alert::success('Perfil cadastrado');
        else
            Alert::error('Erro ao cadastrar perfil');

        return redirect()->route('roles.index');
    }

    ######################################################################################
    ##                                  ALTERAR PERFIL                                  ##
    ######################################################################################
    public function update(RoleFormRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        if ($request->permissions)
            $role->permissions()->sync($request->permissions);
        else
            $role->permissions()->detach();

        if ($role)
            Alert::success('Perfil alterado');
        else
            Alert::error('Erro ao alterar perfil');

        return back();
    }

    ######################################################################################
    ##                                  EXCLUIR PERFIL                                  ##
    ######################################################################################
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        if ($role)
            Alert::success('Perfil excluído');
        else
            Alert::error('Erro ao excluir perfil');

        return back();
    }

    ######################################################################################
    ##                                PESQUISAR PERFIL                                  ##
    ######################################################################################
    public function roles_search(Request $request, Role $role)
    {
        $title = 'Listagem de Perfis';

        $dataForm = $request->all();
        $roles = $role->search($dataForm, $this->totalPage);

        $permissionsForSelect = Role::permissionsForSelect();

        if ($request->pesquisa == 'Sim')
            return redirect($request->url() . '?texto=' . $request->get('texto', 1) . '&page=1');
        else
            return view('painel.administrador.roles.index', compact('title', 'roles', 'permissionsForSelect'));
    }

    ######################################################################################
    ##                                 IMPRIMIR PERFIS                                  ##
    ######################################################################################
    public function roles_pdf(Request $request, Role $role)
    {
        $title = 'Listagem de Perfis';

        $dataForm = $request->all();
        $roles = $role->search($dataForm, null);

        $total = $roles->count();
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('painel.administrador.roles.pdf', compact('title', 'roles', 'total')));
        $dompdf->setPaper('A4');
        $dompdf->render();
        $font = $dompdf->getFontMetrics()->get_font("helvetica"); //, "bold"
        $dompdf->getCanvas()->page_text(25, 820, "Impresso por: " . Auth::user()->name, $font, 8, array(0, 0, 0));
        $dompdf->getCanvas()->page_text(500, 825, "Página: {PAGE_NUM} de {PAGE_COUNT}", $font, 8, array(0, 0, 0));
        $dompdf->stream("roles.pdf", array("Attachment" => false));
    }
}
