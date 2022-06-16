<div class="modal fade" id="destroy{{$protocol_document->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center"><b>Exclusão de Documento</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::model($protocol, ['route' => ['documentos.destroy', $protocol_document->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'DELETE']) }}
                    {{ Form::hidden('url_anterior', $url_anterior, array('class' => 'form-control', 'required' => '')) }}
                    {{ Form::hidden('protocol_id', $protocol->id, array('class' => 'form-control', 'required' => '')) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Nome') }}
                        {{ Form::text('name', $protocol_document->document->name, array('class' => 'form-control', 'disabled' => 'true')) }}
                    </div>
                    <hr>
                    <p><b>Criado por:</b> {{$protocol_document->created_by}} <b>em</b> @dataHora($protocol_document->created_at)</p>
                    <p><b>Alterado por:</b> {{$protocol_document->updated_by}} <b>em</b> @dataHora($protocol_document->updated_at)</p>
                    <hr>
                    <div class=text-right>
                        {{ Form::submit('Excluir', ['class' => 'btn btn-success button-prevent-multiple-submits']) }}
                        {{ Form::submit("Sair", ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}
                    </div> 
                {{ Form::close() }} 
            </div>
        </div>
    </div>
</div>