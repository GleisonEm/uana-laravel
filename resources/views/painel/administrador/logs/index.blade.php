@extends('adminlte::page')

@section('content')
    @php
      $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
      if(isset($_POST['texto']) || isset($_GET['texto']) ) {    
        $_POST['texto'] = isset($_POST['texto']) ? $_POST['texto'] : $_GET['texto'];
        $_GET['texto'] =  $_POST['texto'];
      }
    @endphp

    <div class="col-md-12 col-sm-12 col-xs-12  table-responsive">			
        <div class="x_title">
            <a href="#pdf" data-toggle="modal" class="btn {{ config('adminlte.botaoImprimir') }}"> 
                <span class="fa fa-print"></span> Imprimir
            </a>        
            <a href="{{route('home')}}" data-toggle="modal" class="btn {{ config('adminlte.botaoImprimir') }}"> 
                <span class="fa fa-sign-out"></span> Sair
            </a>  
            <form class="navbar-form navbar-right" role="search" action="{{route('logs.search')}}" method="post">
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
                <th>Data e Hora</th>
                <th>Tabela</th>
                <th>Operação</th>
                <th>Registro</th>
                <th>Usuário</th>
                <th>IP</th>
            </tr>
            @forelse($logs as $log)
                <tr>
                    <td>@dataHora($log->datetime)</td>
                    <td>{{ $log->table }}</td>
                    <td>{{ $log->actionLog($log->action) }}</td>
                    <td>{{ $log->message }}</a></td>
                    <td>{{ $log->user->name }}</td>
                    <td>{{ $log->ip }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="90">
                        <p>Nenhum Resultado</p>
                    </td>
                </tr>
            @endforelse 
        </table>
        {{ $logs->appends(request()->except('_token'))->links() }} 
    </div>   
    @include ('painel.administrador.logs.modals.pdf.modal_pdf')     
@endsection