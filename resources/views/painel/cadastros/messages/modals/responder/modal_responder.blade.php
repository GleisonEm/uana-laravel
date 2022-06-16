<div class="modal fade" id="responder{{$messageReceiver->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Responder à {{$messageReceiver->usuarioSender->name}}</b></h4>
            </div>
            <div class="modal-body">  
                {{ Form::open(['route' => 'messages.responderMensagem', 'class' => 'form form-prevent-multiple-submits']) }}
                    {{ Form::hidden('user_sender', $messageReceiver->user_sender, array('class' => 'form-control', 'required' => '')) }}
                    {{ Form::hidden('id', $messageReceiver->id, array('class' => 'form-control', 'required' => '')) }}
                    <div class="form-group">
                        {{ Form::label('message', 'Mensagem *') }}
                        {{ Form::textarea('message', null, array('class' => 'form-control', 'style' => 'resize:none', 'required' => '', 'rows' => '5', 'maxlength' => '500')) }}
                    </div>  

                    <hr>
                    <div class=text-right>
                        {{ Form::submit('Enviar', ['class' => 'btn btn-primary button-prevent-multiple-submits']) }}
                        {{ Form::submit('Sair', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                    </div>           
                {{ Form::close() }}   
            </div>
        </div>
    </div>
</div>
