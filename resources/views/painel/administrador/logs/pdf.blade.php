@extends('layouts.pdf.pdf_relatorio')

@section('content')
    <table class="table table-bordered table-striped">
        <tr>
            <th>Data e Hora</th>
            <th>Tabela</th>
            <th>Operação</th>
            <th>Registro</th>
            <th>Usuário</th>
        </tr>
        @forelse($logs as $log)
            <tr>
                <td>@dataHora($log->datetime)</td>
                <td>{{ $log->table }}</td>
                <td>{{ $log->actionLog($log->action) }}</td>
                <td>{{ $log->message }}</a></td>
                <td>{{ $log->user->name }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="90">
                    <p>Nenhum Resultado</p>
                </td>
            </tr>
        @endforelse 
    </table>
@endsection

