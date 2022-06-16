<div class="modal fade" id="update{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Alteração de Usuário</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::model($user, ['route' => ['users.update', $user->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT']) }}
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
                            <div class="form-group">
                                {{ Form::label('assignment_id', 'Função *', array('class' => 'control-label')) }}
                                <br>
                                {{ Form::select('assignment_id', $assignmentsForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => '']) }}
                            </div>  
                            <div class="form-group">
                                {{ Form::label('institute_id', 'Instituição *', array('class' => 'control-label')) }}
                                <br>
                                {{ Form::select('institute_id', $institutesForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => '']) }}
                            </div>                              
                            <div class="form-group">
                                {{ Form::label('area_id', 'Área de Conhecimento *', array('class' => 'control-label')) }}
                                <br>
                                {{ Form::select('area_id', $areasForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => '']) }}
                            </div>  
                            <div class="form-group">
                                {{ Form::label('roles[]', 'Perfil *') }}
                                <br>
                                {{ Form::select('roles[]', $rolesForSelect, old('roles[]'), ['class' => "form-control select2-multi", 'multiple' => 'multiple', 'style' => 'width:100%;', 'required' => '']) }}
                            </div>   
                            <div class="form-group">
                                {{ Form::label('tags', 'Áreas de interesse') }}
                                <br>
                                {{ Form::text('tags', null, array('class' => 'form-control', 'data-role' => 'tagsinput')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('block', 'Bloqueado *', array('class' => 'control-label')) }}
                                <br>
                                {{ Form::select('block', ['S' => 'Sim', 'N' => 'Não'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => '']) }}
                            </div> 
                        </div>   
                    </div>
                    <hr>
                    <div class=text-right>
                        {{ Form::submit('Alterar', ['class' => 'btn btn-primary button-prevent-multiple-submits']) }}
                        {{ Form::submit("Sair", ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                    </div> 
                {{ Form::close() }}         
            </div>
        </div>
    </div>
</div>