@extends('layouts.pdf.pdf_relatorio')

@section('content')
    <table class="table table-bordered table-striped">
        <tr>
            <th>Função</th>
        </tr>
        @forelse($assignments as $assignment)
            <tr>
                <td>{{ $assignment->name }}</td>
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

