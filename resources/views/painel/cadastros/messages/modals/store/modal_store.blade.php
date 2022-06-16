<div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Cadastro de Mensagem</b></h4>
            </div>
            <div class="modal-body">  
                {{ Form::open(['route' => 'messages.store', 'class' => 'form form-prevent-multiple-submits']) }}
                    <div class="form-group">
                        {{ Form::label('message', 'Mensagem *') }}
                        {{ Form::textarea('message', null, array('class' => 'form-control', 'style' => 'resize:none', 'required' => '', 'rows' => '5', 'maxlength' => '500')) }}
                    </div>  

                    <div class="form-group">
                        {{ Form::label('user_receiver', 'Para *', array('class' => 'control-label')) }}
                        {{ Form::select('user_receiver', $usersForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => '']) }}
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
