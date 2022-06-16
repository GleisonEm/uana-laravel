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
        <div class="x_title">
            @can('cadastros_turmas_cadastrar')        
                <a href="#store" data-toggle="modal" class="btn {{ config('adminlte.botaoCadastrar') }}"> 
                    <span class="fa fa-plus"></span> Cadastrar
                </a>
            @endcan 
            @can('cadastros_turmas_imprimir')        
                <a href="#pdf" data-toggle="modal" class="btn {{ config('adminlte.botaoImprimir') }}"> 
                    <span class="fa fa-print"></span> Imprimir
                </a>        
            @endcan 
            <a href="{{route('home')}}" data-toggle="modal" class="btn {{ config('adminlte.botaoImprimir') }}"> 
                <span class="fa fa-sign-out"></span> Sair
            </a>  
            <form class="navbar-form navbar-right" role="search" action="{{route('teams.search')}}" method="post">
                <div class="form-group">
                    {{ csrf_field() }}
                    <input type="text" name="texto" class="form-control" placeholder="Pesquisar">
                    {{ Form::hidden('page', $_GET['page'], array('class' => 'form-control', 'required' => '')) }}
                    {{ Form::hidden('pesquisa', 'Sim', array('class' => 'form-control', 'required' => '')) }}
                </div>    
                <button type="submit" class="btn {{ config('adminlte.botaoPesquisar') }}"><span class="fa fa-search-plus"></span> Pesquisar</button>
            </form> 
        </div>  
        <table class="table table-bordered table-striped">
            <tr>
                <th>Turma</th>
                <th>Curso</th>
                <th>Criada por</th>
                <th>Código da Turma</th>
                <th>Ações</th>
            </tr>
            @forelse($teams as $team)
                <tr>
                    <td><a href="#show{{$team->id}}" data-toggle="modal">{{ $team->name }}</a></td>
                    <td>{{ $team->course->name }}</td>
                    <td>{{ $team->user->name }}</td>
                    <td>{{ $team->key }}</td>
                    <td width="1%" nowrap>
                        @can('cadastros_turmas_alterar')
                            <a href="#update{{$team->id}}" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoAlterar') }}">
                                <span class="fa fa-pencil"></span> Alterar
                            </a>
                        @endcan
                        @can('cadastros_turmas_excluir')
                            <a href="#destroy{{$team->id}}" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoExcluir') }}">
                                <span class="fa fa-trash"></span> Excluir
                            </a> 
                        @endcan    
                            <a href="{{route('alunos.index', $team->id)}}" data-toggle="modal" class="btn btn-xs btn-info">
                                <span class="fa fa-user"></span> Alunos
                            </a> 

                            <a href="#" data-toggle="modal" class="btn btn-xs btn-info">
                                <span class="fa fa-share-square-o"></span> Atividades
                            </a> 
                            <a href="{{route('posts.index', $team->id)}}" data-toggle="modal" class="btn btn-xs btn-info">
                                <span class="fa fa-send"></span> Postagens
                            </a>

                        @include ('painel.cadastros.teams.modals.show.modal_show')
                        @include ('painel.cadastros.teams.modals.update.modal_update')
                        @include ('painel.cadastros.teams.modals.destroy.modal_destroy')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="90">
                        <p>Nenhum Resultado</p>
                    </td>
                </tr>
            @endforelse 
        </table>
        {{ $teams->appends(request()->except('_token'))->links() }} 
    </div>
    @include ('painel.cadastros.teams.modals.store.modal_store')
    @include ('painel.cadastros.teams.modals.pdf.modal_pdf')
@endsection