<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Alert;

class Post extends Model
{
    public $timestamps  = true;
    protected $table = 'posts';
    protected $fillable = ['titulo, subtitulo', 'conteudo', 'tags', 'team_id', 'user_id', 'imagem'];

    public static function boot()
    {
        //parent::userRegister();
    }

    //- RELACIONAMENTO COM TURMAS (One to One) -----------------------------------------------
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    //- RELACIONAMENTO COM TURMAS (One to Many) ------------------------------
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    //- RELACIONAMENTO COM USUÁRIOS (One to One) -----------------------------------------------
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //- RELACIONAMENTO COM CURSOS (One to Many) ------------------------------
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    //- RETORNA O NUMERO DE LIKES POR POST -----------------------------------------------
    public function numeroLikes($post_id)
    {
        $total_likes = Like::orderBy('id', 'desc')
            ->where('post_id', $post_id)
            ->count();

        if ($total_likes) {
            if ($total_likes == 1)
                return $total_likes . ' like';
            else
                return $total_likes . ' likes';
        } else {
            return 0 . ' like';
        }
    }

    //- VERIFICA LIKES -----------------------------------------------
    public function verificaLikes($post_id)
    {
        $verifica_likes = Like::orderBy('id', 'desc')
            ->Where('post_id', $post_id)
            ->Where('user_id', Auth::user()->id)
            ->count();

        if ($verifica_likes)
            return false;
        else
            return true;
    }

    //- RETORNA O NUMERO DE COMENTÁRIOS POR POST -----------------------------------------------
    public function numeroComentarios($post_id)
    {
        $total_comentarios = Comment::orderBy('id', 'desc')
            ->where('post_id', $post_id)
            ->count();

        if ($total_comentarios) {
            if ($total_comentarios == 1)
                return $total_comentarios . ' comentário';
            else
                return $total_comentarios . ' comentários';
        } else {
            return 0 . ' comentário';
        }
    }

    //- VERIFICA COMENTÁRIOS -----------------------------------------------
    public function verificaComentarios($post_id)
    {
        $verifica_comments = Comment::orderBy('id', 'desc')
            ->Where('post_id', $post_id)
            ->Where('user_id', Auth::user()->id)
            ->count();

        if ($verifica_comments)
            return false;
        else
            return true;
    }
}
