<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use Dompdf\Dompdf;
use Auth;
use Alert;
use Image;

class UserController extends Controller
{
    private $totalPage = 10;

    ######################################################################################
    ##                               TELA DE USUÁRIOS                                   ##
    ######################################################################################
    public function index()
    {
        $title = 'Listagem de Usuários';
        $users = User::orderBy('name', 'asc')->paginate($this->totalPage);
        $rolesForSelect = User::rolesForSelect();
        $assignmentsForSelect = User::assignmentsForSelect();
        $institutesForSelect = User::institutesForSelect();
        $areasForSelect = User::areasForSelect();

        return view('painel.administrador.users.index', compact('title', 'users', 'rolesForSelect', 'assignmentsForSelect', 'institutesForSelect', 'areasForSelect'));
    }

    ######################################################################################
    ##                               CADASTRAR USUÁRIO                                  ##
    ######################################################################################
    public function store(UserFormRequest $request)
    {
        if (($request->password) == ($request->password_confirmation)) {
            $user = new User;
            $user->cpf = $request->cpf;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->assignment_id = $request->assignment_id;
            $user->institute_id = $request->institute_id;
            $user->area_id = $request->area_id;
            $user->tags = $request->tags;
            $user->block = $request->block;
            $user->save();

            if ($request->roles)
                $user->roles()->sync($request->roles);
            else
                $user->roles()->detach();
            if ($user)
                Alert::success('Usuário cadastrado');
            else
                Alert::error('Erro ao cadastrar usuário');
        } else {
            Alert::error('Confirmação de senha não confere')->persistent("Ok");
        }

        return redirect()->route('users.index');
    }

    ######################################################################################
    ##                                 ALTERAR USUÁRIO                                  ##
    ######################################################################################
    public function update(UserFormRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->cpf = $request->cpf;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->assignment_id = $request->assignment_id;
        $user->institute_id = $request->institute_id;
        $user->area_id = $request->area_id;
        $user->tags = $request->tags;
        $user->block = $request->block;
        $user->save();

        if ($request->roles)
            $user->roles()->sync($request->roles);
        else
            $user->roles()->detach();
        if ($user)
            Alert::success('Usuário alterado');
        else
            Alert::error('Erro ao alterar usuário');

        return back();
    }

    ######################################################################################
    ##                                 EXCLUIR USUÁRIO                                  ##
    ######################################################################################
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if ($user)
            Alert::success('Usuário excluído');
        else
            Alert::error('Erro ao excluir usuário');

        return back();
    }

    ######################################################################################
    ##                               PESQUISAR USUÁRIO                                  ##
    ######################################################################################
    public function users_search(Request $request, User $user)
    {
        $title = 'Listagem de Usuários';

        $dataForm = $request->all();
        $users = $user->search($dataForm, $this->totalPage);

        $rolesForSelect = User::rolesForSelect();
        $assignmentsForSelect = User::assignmentsForSelect();
        $institutesForSelect = User::institutesForSelect();
        $areasForSelect = User::areasForSelect();

        if ($request->pesquisa == 'Sim')
            return redirect($request->url() . '?institute_id=' . $request->get('institute_id', 1) . '&assignment_id=' . $request->get('assignment_id', 1) . '&texto=' . $request->get('texto', 1) . '&page=1');
        else
            return view('painel.administrador.users.index', compact('title', 'users', 'rolesForSelect', 'assignmentsForSelect', 'institutesForSelect', 'areasForSelect'));
    }

    ######################################################################################
    ##                               IMPRIMIR USUÁRIOS                                  ##
    ######################################################################################
    public function users_pdf(Request $request, User $user)
    {
        $title = 'Listagem de Usuários';

        $dataForm = $request->all();
        $users = $user->search($dataForm, null);

        $total = $users->count();
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('painel.administrador.users.pdf', compact('title', 'users', 'total')));
        $dompdf->setPaper('A4');
        $dompdf->render();
        $font = $dompdf->getFontMetrics()->get_font("helvetica"); //, "bold"
        $dompdf->getCanvas()->page_text(25, 820, "Impresso por: " . Auth::user()->name, $font, 8, array(0, 0, 0));
        $dompdf->getCanvas()->page_text(500, 825, "Página: {PAGE_NUM} de {PAGE_COUNT}", $font, 8, array(0, 0, 0));
        $dompdf->stream("users.pdf", array("Attachment" => false));
    }

    ######################################################################################
    ##                          ATUALIZAR PERFIL DO USUÁRIO                             ##
    ######################################################################################
    public function users_profile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (Input::hasFile('avatar')) {
            $avatar = Input::file('avatar');
            // $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $filename = Auth::user()->id . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('assets/uploads/avatars/' . $filename));
            $user->avatar = $filename;
            $user->save();
            if ($user)
                Alert::success('Perfil alterado');
            else
                Alert::error('Erro ao alterar perfil');
        }

        return back();
    }

    ######################################################################################
    ##                          ALTERAR SENHA DO USUÁRIO                                ##
    ######################################################################################
    public function users_password(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (($request->password) == ($request->password_confirmation)) {
            $user->password = bcrypt($request->password);
            $user->save();
            if ($user)
                Alert::success('Senha alterada');
            else
                Alert::error('Erro ao alterar senha');
        } else {
            Alert::error('Confirmação de senha não confere')->persistent("Ok");
        }

        return back();
    }

    //- Upload da assinatura do usuário ----------------------------------------------------
    public function users_signature(Request $request, $id)
    {
        $request->all();
        $nameFile = null;
        $signature = User::findOrFail($id);

        $name = 'assinatura' . '_' . $signature->id;
        $extension = $request->signature->extension();
        $nameFile = "{$name}.{$extension}";

        $dataform = [
            'path_signature' => $nameFile,
        ];
        $signature->update($dataform);

        if ($request->hasFile('signature') && $request->file('signature')->isValid()) {
            $destinationPath = public_path() . '/assets/uploads/signatures/' . $signature->id . '/';
            $file =  $request->file('signature');
            $file->move($destinationPath, $nameFile);
        }

        if ($signature)
            Alert::success('Assinatura enviada');
        else
            Alert::error('Erro ao enviar Assinatura');

        return back();
    }

    ######################################################################################
    ##                              ALTERAR DADOS DO USUÁRIO                            ##
    ######################################################################################
    public function meusDados()
    {

        $title = 'Meus Dados';
        $user = User::orderBy('name', 'asc')
            ->where('id', Auth::user()->id)
            ->get();


        $user_tag = Auth::user()->tags;


        $posts = Post::orderBy('tags', 'asc')
            //    ->where('tags', 'like', '%'.'teste'.'%')
            ->paginate($this->totalPage);


        $array_tag = explode(',', $user_tag);

        //dd($array_tag);

        //       $posts = Post::join('users', 'posts.user_id', 'like', 'users.id')
        //     ->where('posts.tags', 'like', '%'.'arduino'.'%')
        //     ->paginate($this->totalPage);



        $areasForSelect = User::areasForSelect();

        return view('painel.administrador.users.meusDados', compact('title', 'user', 'areasForSelect', 'users', 'posts', 'array_tag'));
    }

    ######################################################################################
    ##                              ALTERAR DADOS DO USUÁRIO                            ##
    ######################################################################################
    public function dadosUpdate(Request $request)
    {
        $data = $request->all();

        $update = auth()->user()->update($data);

        if ($update)
            Alert::success('Dados alterados');
        else
            Alert::error('Erro ao alterar dados');

        return back();
    }
}
