<div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center"><b>Cadastro de Documento</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => 'documentos.store', 'class' => 'form form-prevent-multiple-submits']) }}
                    {{ Form::hidden('url_anterior', $url_anterior, array('class' => 'form-control', 'required' => '')) }}
                    {{ Form::hidden('protocol_id', $protocol->id, array('class' => 'form-control', 'required' => '')) }}
                    <div class="form-group">
                        {{ Form::label('document_id', 'Documento *', array('class' => 'control-label')) }}
                        {{ Form::select('document_id', $documentsForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => '']) }}
                    </div>  
                    <hr>
                    <div class=text-right>
                        {{ Form::submit('Cadastrar', ['class' => 'btn btn-success button-prevent-multiple-submits']) }}
                        {{ Form::submit('Sair', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}
                    </div>           
                {{ Form::close() }}   
            </div>
        </div>
    </div>
</div>