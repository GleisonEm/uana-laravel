@extends('layouts.pdf.pdf_relatorio')

@section('content')
    <table class="table table-bordered table-striped">
        <tr>
            <th>Permissão</th>
            <th>Descrição</th>
        </tr>
        @forelse($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->description}}</td>
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

