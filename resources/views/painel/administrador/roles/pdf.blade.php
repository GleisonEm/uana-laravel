@extends('layouts.pdf.pdf_relatorio')

@section('content')
        <table class="table table-bordered table-striped">
            <tr>
                <th>Perfil</th>
                <th>Permissões</th>
            </tr>
            @forelse($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->permissions()->pluck('name')->implode(', ') }}</td>
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

