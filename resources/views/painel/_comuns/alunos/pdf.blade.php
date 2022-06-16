@extends('layouts.pdf.pdf_relatorio')

@section('content')
    <table class="table table-bordered table-striped table-responsive">
        <tr>
            <th>Protocolo</th>
            <th>Data do Protocolo</th>
            <th>Natureza Solicitação</th>
        </tr>
        <tr>
            <td width="10%" nowrap>{{$protocol->numero_protocolo}}/{{$protocol->ano}}</td>
            <td width="10%" nowrap>@dataHora($protocol->data_protocolo)</td>
            <td width="12%" nowrap>{{$protocol->license->name}}</td>
        </tr>            
    </table>     

    <br>

    <table class="table table-bordered table-striped">
        <tr>
            <th>Documentos Necessários</th>
        </tr>
        @forelse($protocol_documents as $protocol_document)
            <tr>
                <td>{{ $protocol_document->document->name }}</td>
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



