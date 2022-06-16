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
            @can('administrador_usuarios_cadastrar')        
                <a href="#store" data-toggle="modal" class="btn {{ config('adminlte.botaoCadastrar') }}"> 
                    <span class="fa fa-plus"></span> Cadastrar
                </a>
            @endcan 
            @can('administrador_usuarios_imprimir')        
                <a href="#pdf" data-toggle="modal" class="btn {{ config('adminlte.botaoImprimir') }}"> 
                    <span class="fa fa-print"></span> Imprimir
                </a>        
            @endcan             
            <a href="{{route('home')}}" data-toggle="modal" class="btn {{ config('adminlte.botaoImprimir') }}"> 
                <span class="fa fa-sign-out"></span> Sair
            </a>  
            <form class="navbar-form navbar-right" role="search" action="{{route('users.search')}}" method="post">
                <div class="form-group">
                    {{ csrf_field() }}
                    {{ Form::select('institute_id', $institutesForSelect, null, ['class' => 'form-control select2', 'placeholder' => 'TODAS AS INSTITUIÇÕES']) }}  
                    {{ Form::select('assignment_id', $assignmentsForSelect, null, ['class' => 'form-control select2', 'placeholder' => 'TODAS AS FUNÇÕES']) }}  
                    <input type="text" name="texto" class="form-control" placeholder="Pesquisar">
                    {{ Form::hidden('page', $_GET['page'], array('class' => 'form-control', 'required' => '')) }}
                    {{ Form::hidden('pesquisa', 'Sim', array('class' => 'form-control', 'required' => '')) }}
                </div>    

                <button type="submit" class="btn {{ config('adminlte.botaoPesquisar') }}"><span class="fa fa-search-plus"></span> Pesquisar</button>
            </form>
        </div>  
        <table class="table table-bordered table-striped">
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Função</th>
                <th>Instituição</th>
                <th>Perfil</th>
                <th>Data de cadastro</th>
                <th width="200px">Ações</th> 
            </tr>
            @forelse($users as $user)
                <tr>
                    <td width="5%" nowrap><a href="#show{{$user->id}}" data-toggle="modal">{{ $user->cpf }}</a></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->assignment->name }}</td>
                    <td>{{ $user->institute->name }}</td>
                    <td>{{ $user->roles()->pluck('name')->implode(', ') }}</td>
                    <td> @dataHora($user->created_at)</td>
                    <td width="1%" nowrap>
                        @can('administrador_usuarios_alterar')
                            <a href="#update{{$user->id}}" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoAlterar') }}">
                                <span class="fa fa-pencil"></span> Alterar
                            </a>
                        @endcan
                        @can('administrador_usuarios_excluir')      
                            <a href="#destroy{{$user->id}}" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoExcluir') }}">
                                <span class="fa fa-trash"></span> Excluir
                            </a> 
                        @endcan                        
                        @can('administrador_usuarios_senha')
                            <a href="#password{{$user->id}}" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoCadastrar') }}">
                                <span class="fa fa-key"></span> Senha
                            </a> 
                        @endcan   
                            
                        <a href="#signature{{$user->id}}" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoCadastrar') }}">
                            <span class="fa fa-key"></span> Assinatura
                        </a> 

                        @if ($user->path_signature != null)
                            <a target="_blank" href="{{url('assets/uploads/signatures/'.$user->id, $user->path_signature)}}" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoCadastrar') }}">
                                <span class="fa fa-cloud-download"></span> Sim
                            </a>  
                        @endif

                        @include ('painel.administrador.users.modals.signature.modal_signature')
                        @include ('painel.administrador.users.modals.show.modal_show')
                        @include ('painel.administrador.users.modals.update.modal_update')
                        @include ('painel.administrador.users.modals.destroy.modal_destroy')
                        @include ('painel.administrador.users.modals.password.modal_password')
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
        {{ $users->appends(request()->except('_token'))->links() }}         
    </div> 
    @include ('painel.administrador.users.modals.store.modal_store')
    @include ('painel.administrador.users.modals.pdf.modal_pdf')
@endsection