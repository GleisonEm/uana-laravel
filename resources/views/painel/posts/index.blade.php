@extends('adminlte::page')

@section('content')
    @php
      $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
      if(isset($_POST['texto']) || isset($_GET['texto']) ) {    
        $_POST['texto'] = isset($_POST['texto']) ? $_POST['texto'] : $_GET['texto'];
        $_GET['texto'] =  $_POST['texto'];
      }
    @endphp


    <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
        <br>
        <a href="#store" data-toggle="modal" class="btn {{ config('adminlte.botaoCadastrar') }}"> 
            <span class="fa fa-send"></span> Compartilhe algo com a turma
        </a>
        <a href="{{route('home')}}" data-toggle="modal" class="btn {{ config('adminlte.botaoImprimir') }}"> 
            <span class="fa fa-sign-out"></span> Sair
        </a> 
        <hr>
        <table class="table table-bordered table-striped">
            @forelse($posts as $post)
                <tr>
                    <td>
                        <div class="box-header with-border">
                            <div class="user-block">
                                <img class="img-circle" src="{{url('assets/uploads/avatars', $post->user->avatar)}}">
                                <span class="username"><a href="#">{{ $post->user->name }}</a></span>
                                <span class="description">Compartinhamento - @dataHora($post->created_at)</span>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="attachment-block clearfix">
                                @if ($post->user_id == Auth::user()->id)
                                    <h4 class="attachment-heading"><a href="#update{{$post->id}}" data-toggle="modal">{{ $post->titulo }}</a></h4>
                                @else
                                    <h4 class="attachment-heading"><a href="#" data-toggle="modal">{{ $post->titulo }}</a></h4>
                                @endif
                                <br>
                                <img src="{{url('assets/img/posts', $post->id.'-'.$post->imagem)}}" style="width:300px; height:200px;" alt="Attachment Image">
                                <br>
                                <br>
                                <p align="justify">{{ $post->conteudo }}</p>
                            </div>

                            <a href="#" class="btn btn-xs btn-default">
                                <span class="fa fa-share"></span> Compartilhar
                            </a>                            
                                
                            @if ($post->verificaLikes($post->id))
                                <a href="{{route('posts.like', [$post->team_id, $post->id])}}" class="btn btn-xs btn-default">
                                    <span class="fa fa-thumbs-o-up"></span> Like
                                </a>
                            @else
                                <a href="#" class="btn btn-xs btn-primary">
                                    <span class="fa fa-thumbs-o-up"></span> Like
                                </a>
                            @endif
                            
                            @if ($post->verificaComentarios($post->id))
                                <a href="#comment{{$post->id}}" data-toggle="modal" class="btn btn-xs btn-default">
                                    <span class="fa fa-comment-o"></span> Comentar
                                </a>
                            @else
                                <a href="#comment{{$post->id}}" data-toggle="modal" class="btn btn-xs btn-primary">
                                    <span class="fa fa-comment-o"></span> Comentar
                                </a>
                            @endif
                            <span class="pull-right text-muted">{{$post->numeroLikes($post->id)}} - {{$post->numeroComentarios($post->id)}}</span>
                        </div>

                    <!--    <div class="box-footer box-comments">
                            <div class="box-comment">
                                <img class="img-circle img-sm" src="{{url('assets/uploads/avatars', $post->user->avatar)}}" alt="User Image">
                                <div class="comment-text">
                                    <span class="username">Maria Gonzale
                                        <span class="text-muted pull-right">8:03 PM Today</span>
                                    </span>
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                </div>
                            </div>
                        </div>  -->

                        @include ('painel.posts.modals.update.modal_update')                    
                        @include ('painel.posts.modals.comment.modal_comment')                    
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="90">
                        <p>Nenhum Compartilhamento</p>
                    </td>
                </tr>
            @endforelse 
        </table>
        {{ $posts->appends(request()->except('_token'))->links() }} 
    </div>

</div>

    @include ('painel.posts.modals.store.modal_store')
@endsection