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
            @can('cadastros_cursos_cadastrar')        
                <a href="#store" data-toggle="modal" class="btn {{ config('adminlte.botaoCadastrar') }}"> 
                    <span class="fa fa-plus"></span> Cadastrar
                </a>
            @endcan 
            @can('cadastros_cursos_imprimir')        
                <a href="#pdf" data-toggle="modal" class="btn {{ config('adminlte.botaoImprimir') }}"> 
                    <span class="fa fa-print"></span> Imprimir
                </a>        
            @endcan 
            <a href="{{route('home')}}" data-toggle="modal" class="btn {{ config('adminlte.botaoImprimir') }}"> 
                <span class="fa fa-sign-out"></span> Sair
            </a>  
            <form class="navbar-form navbar-right" role="search" action="{{route('courses.search')}}" method="post">
                <div class="form-group">
                    {{ csrf_field() }}
                    {{ Form::select('institute_id', $institutesForSelect, null, ['class' => 'form-control select2', 'placeholder' => 'TODAS AS INSTITUIÇÕES']) }}                    
                    <input type="text" name="texto" class="form-control" placeholder="Pesquisar">
                    {{ Form::hidden('page', $_GET['page'], array('class' => 'form-control', 'required' => '')) }}
                    {{ Form::hidden('pesquisa', 'Sim', array('class' => 'form-control', 'required' => '')) }}
                </div>    
                <button type="submit" class="btn {{ config('adminlte.botaoPesquisar') }}"><span class="fa fa-search-plus"></span> Pesquisar</button>
            </form> 
        </div>  
        <table class="table table-bordered table-striped">
            <tr>
                <th>Instituição</th>
                <th>Curso</th>
                <th>Professores</th>
                <th>Ações</th>
            </tr>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->institute->name }}</td>
                    <td><a href="#show{{$course->id}}" data-toggle="modal">{{ $course->name }}</a></td>
                    <td>{{ $course->users()->pluck('name')->implode(', ') }}</td>
                    <td width="10%" nowrap>
                        @can('cadastros_cursos_alterar')
                            <a href="#update{{$course->id}}" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoAlterar') }}">
                                <span class="fa fa-pencil"></span> Alterar
                            </a>
                        @endcan
                        @can('cadastros_cursos_excluir')
                            <a href="#destroy{{$course->id}}" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoExcluir') }}">
                                <span class="fa fa-trash"></span> Excluir
                            </a> 
                        @endcan    
                        @include ('painel.cadastros.courses.modals.show.modal_show')
                        @include ('painel.cadastros.courses.modals.update.modal_update')
                        @include ('painel.cadastros.courses.modals.destroy.modal_destroy')
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
        {{ $courses->appends(request()->except('_token'))->links() }} 
    </div>
    @include ('painel.cadastros.courses.modals.store.modal_store')
    @include ('painel.cadastros.courses.modals.pdf.modal_pdf')
@endsection