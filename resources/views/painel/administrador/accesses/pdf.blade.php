@extends('layouts.pdf.pdf_relatorio')

@section('content')
    <table class="table table-bordered table-striped">
        <tr>
            <th>Usuário</th>
            <th>Data/Hora</th>
            <th>IP</th>        
            <th>Ação</th>
        </tr>
        @forelse($accesses as $access)
            <tr>
                <td>{{ $access->user->name }}</td>
                <td>@dataHora($access->datetime)</td>
                <td>{{ $access->ip }}</td>
                <td>{{ $access->typeAccess($access->action) }}</td>
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

