<div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Cadastro de Usuário</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => 'users.store', 'class' => 'form form-prevent-multiple-submits']) }}
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                {{ Form::label('cpf', 'CPF *') }}
                                {{ Form::text('cpf', null, array('class' => 'form-control mascara-cpfcnpj', 'required' => '')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Nome *') }}
                                {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '50')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('email', 'Email *') }}
                                {{ Form::email('email', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '50')) }}
                            </div>
                        </div>   
                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                            {{ Form::label('password', 'Senha *') }}<br>
                            {{ Form::password('password', array('class' => 'form-control', 'required' => '', 'minlength' => '6', 'maxlength' => '10')) }}
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                            {{ Form::label('password', 'Confirmar Senha *') }}<br>
                            {{ Form::password('password_confirmation', array('class' => 'form-control', 'required' => '', 'minlength' => '6', 'maxlength' => '10')) }}
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            {{ Form::label('assignment_id', 'Função *', array('class' => 'control-label')) }}
                            {{ Form::select('assignment_id', $assignmentsForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => '']) }}
                        </div>  
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            {{ Form::label('institute_id', 'Instituição *', array('class' => 'control-label')) }}
                            {{ Form::select('institute_id', $institutesForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => '']) }}
                        </div>  
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            {{ Form::label('area_id', 'Área de Conhecimento *', array('class' => 'control-label')) }}
                            {{ Form::select('area_id', $areasForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => '']) }}
                        </div>  
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            {{ Form::label('roles[]', 'Perfil *') }}
                            {{ Form::select('roles[]', $rolesForSelect, old('roles[]'), ['class' => "form-control select2-multi", 'multiple' => 'multiple', 'style' => 'width:100%;', 'required' => '']) }}
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            {{ Form::label('tags', 'Áreas de interesse') }}
                            <br>
                            {{ Form::text('tags', null, array('class' => 'form-control', 'data-role' => 'tagsinput')) }}
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            {{ Form::label('block', 'Bloqueado *', array('class' => 'control-label')) }}
                            {{ Form::select('block', ['S' => 'Sim', 'N' => 'Não'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => '']) }}
                        </div> 
                    </div>
                    <hr>
                    <div class=text-right>
                        {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary button-prevent-multiple-submits']) !!}
                        {{ Form::submit("Sair", ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                    </div> 
                {{ Form::close() }}         
            </div>
        </div>
    </div>
</div>