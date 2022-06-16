@extends('layouts.pdf.pdf_relatorio')

@section('content')
        <table class="table table-bordered table-striped">
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Função</th>
                <th>Instituição</th>
                <th>Perfil</th>
                <th>Data de cadastro</th>
            </tr>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->cpf }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->assignment->name }}</td>
                    <td>{{ $user->institute->name }}</td>
                    <td>{{ $user->roles()->pluck('name')->implode(', ') }}</td>
                    <td> @dataHora($user->created_at)</td>
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

