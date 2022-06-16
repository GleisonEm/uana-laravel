@extends('layouts.pdf.pdf_relatorio')

@section('content')
    <table class="table table-bordered table-striped">
        <tr>
            <th>Áreas</th>
        </tr>
        @forelse($areas as $area)
            <tr>
                <td>{{ $area->name }}</td>
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

