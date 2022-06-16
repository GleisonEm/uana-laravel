@extends('adminlte::page')

@php
    $url_anterior = URL::previous(); 
@endphp

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
        <div class="x_title">
            <a href=#" data-toggle="modal" class="btn {{ config('adminlte.botaoCadastrar') }}" target="_blank"> 
                <span class="fa fa-print"></span> Imprimir
            </a>   

            <a href="{{$url or $url_anterior}}" data-toggle="modal" class="btn {{ config('adminlte.botaoCadastrar') }}"> 
                <span class="fa fa-mail-reply"></span> Voltar
            </a>        
        </div>  
        <br>

        <table class="table table-bordered table-striped">
            <tr>
                <th>Alunos</th>
                <th>Ações</th>
            </tr>
            @forelse($team_users as $team_user)
                <tr>
                    <td>{{ $team_user->retorna_usuario($team_user->user_id) }}</td>
                    <td width="1%" nowrap>
                        <a href="#" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoAlterar') }}">
                            <span class="fa fa-trash"></span> Excluir Aluno
                        </a>
                        <a href="#" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoAlterar') }}">
                            <span class="fa fa-share-square-o"></span> Atividades
                        </a>                         
                        <a href="#" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoAlterar') }}">
                            <span class="fa fa-send"></span> Postagens
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="90">
                        <p>Nenhum Aluno</p>
                    </td>
                </tr>
            @endforelse 
        </table>
        {!! $team_users->links() !!} 
    </div>


@endsection