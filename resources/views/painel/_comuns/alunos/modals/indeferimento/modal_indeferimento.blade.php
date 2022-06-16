<div class="modal fade" id="indeferimento{{$protocol_document->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center"><b>Motivo do Indeferimento</b></h4>
            </div>
            <div class="modal-body">
               <div class="form-group">
                    {{ Form::textarea('observacao_deferimento', $protocol_document->observacao_deferimento, array('class' => 'form-control', 'style' => 'resize:none', 'rows' => '5', 'required' => '', 'disabled' => 'disabled')) }}
                </div>  
                <p><b>Indeferido em:</b> @dataHora($protocol_document->data_deferimento)</p>
                <hr>
                <div class=text-center>
                    {{ Form::submit("Sair", ['class' => 'btn btn-success', 'data-dismiss' => 'modal']) }}
                    {{ Form::close() }}                        
                </div>  
                <hr>
            </div>
        </div>
    </div>
</div>
