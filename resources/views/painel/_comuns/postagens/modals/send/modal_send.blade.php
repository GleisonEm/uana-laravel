<div class="modal fade" id="send{{$protocol->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center"><b>Confirma o Envio dos Documentos ?</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::model($protocol, ['route' => ['documentos.send', $protocol->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT']) }}
                    {{ Form::hidden('url_anterior', $url_anterior, array('class' => 'form-control', 'required' => '')) }}
                    {{ Form::hidden('protocol_id', $protocol->id, array('class' => 'form-control', 'required' => '')) }}
                    <br>
                    <div class=text-center>
                        {{ Form::submit('SIM', ['class' => 'btn btn-success button-prevent-multiple-submits']) }}
                        {{ Form::submit('NÃO', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}                    
                    </div>  
                    <br>
                {{ Form::close() }}      
            </div>
        </div>
    </div>
</div>
