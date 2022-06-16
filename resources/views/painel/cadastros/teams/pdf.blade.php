@extends('layouts.pdf.pdf_relatorio')

@section('content')
    <table class="table table-bordered table-striped">
        <tr>
            <th>Turma</th>
            <th>Curso</th>
        </tr>
        @forelse($teams as $team)
            <tr>
                <td>{{ $team->name }}</td>
                <td>{{ $team->course->name }}</td>
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

