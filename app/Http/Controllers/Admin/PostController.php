<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Dompdf\Dompdf;
use Auth;
use Alert;
use Image;

class PostController extends Controller
{
    private $totalPage = 3;

    ######################################################################################
    ##                             TELA DE POSTAGENS                                    ##
    ######################################################################################
    public function index($team_id)
    {
        $title = 'Compartilhamentos';
        $posts = Post::orderBy('created_at', 'desc')
            ->where('team_id', $team_id)
            ->paginate($this->totalPage);

        return view('painel.posts.index', compact('title', 'posts', 'team_id'));
    }

    ######################################################################################
    ##                             CADASTRAR POSTAGEM                                   ##
    ######################################################################################
    public function store(PostFormRequest $request)
    {
        $extension = $request->imagem->extension();
        $avatar = $request->imagem;
        $filename = $request->team_id . '.' . $avatar->getClientOriginalExtension() . '.' . $extension;

        $post = new Post;
        $post->titulo = strtoupper($request->titulo);
        $post->subtitulo =  $request->subtitulo;
        $post->conteudo =  $request->conteudo;
        $post->tags =  $request->tags;
        $post->team_id = $request->team_id;
        $post->user_id = Auth::user()->id;
        $post->imagem = $filename;
        $post->save();

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $destinationPath = public_path() . '/assets/img/posts/';
            $file = $request->file('imagem');
            $file->move($destinationPath, $post->id . '-' . $filename);
        }

        if ($post)
            Alert::success('Publicação enviada');
        else
            Alert::error('Erro ao enviar publicação');

        return redirect()->route('posts.index', $request->team_id);
    }

    ######################################################################################
    ##                              ALTERAR POSTAGEM                                    ##
    ######################################################################################
    public function update(PostFormRequest $request, $id)
    {
        $extension = $request->imagem->extension();
        $avatar = $request->imagem;
        $filename = $request->team_id . '.' . $avatar->getClientOriginalExtension() . '.' . $extension;

        $post = Post::findOrFail($id);
        $post->titulo = strtoupper($request->titulo);
        $post->subtitulo =  $request->subtitulo;
        $post->conteudo =  $request->conteudo;
        $post->tags =  $request->tags;
        $post->team_id = $request->team_id;
        $post->user_id = Auth::user()->id;
        $post->imagem = $filename;
        $post->save();

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $destinationPath = public_path() . '/assets/img/posts/';
            $file = $request->file('imagem');
            $file->move($destinationPath, $post->id . '-' . $filename);
        }

        if ($post)
            Alert::success('Publicação alterada');
        else
            Alert::error('Erro ao alterar publicação');

        return redirect()->route('posts.index', $request->team_id);
    }

    ######################################################################################
    ##                              EXCLUIR PROSTAGEM                                   ##
    ######################################################################################
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if ($post)
            Alert::success('Publicação excluída');
        else
            Alert::error('Erro ao excluir publicação');

        return back();
    }

    public function like($team_id, $post_id)
    {
        $like = new Like;
        $like->post_id = $post_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        if ($like)
            Alert::success('Você deu um like');
        else
            Alert::error('Erro');

        return redirect()->route('posts.index', $team_id);
    }

    public function comment(Request $request, $post_id)
    {
        $comment = new Comment;
        $comment->commnet = $request->comment;
        $comment->post_id = $post_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        if ($comment)
            Alert::success('Comentário adicionado');
        else
            Alert::error('Erro ao comentar');

        return redirect()->route('posts.index', $request->team_id);
    }
}
