@extends('layouts.pdf.pdf_relatorio')

@section('content')
    <table class="table table-bordered table-striped">
        <tr>
            <th>Instituição</th>
            <th>Curso</th>
            <th>Professores</th>
        </tr>
        @forelse($courses as $course)
            <tr>
                <td>{{ $course->institute->name }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->users()->pluck('name')->implode(', ') }}</td>
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

