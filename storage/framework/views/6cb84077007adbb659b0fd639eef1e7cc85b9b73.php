<div class="modal fade" id="update<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Alteração de Usuário</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::model($user, ['route' => ['users.update', $user->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT'])); ?>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo e(Form::label('cpf', 'CPF *')); ?>

                                <?php echo e(Form::text('cpf', null, array('class' => 'form-control mascara-cpfcnpj', 'required' => ''))); ?>

                            </div>                       
                            <div class="form-group">
                                <?php echo e(Form::label('name', 'Nome *')); ?>

                                <?php echo e(Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '50'))); ?>

                            </div>
                            <div class="form-group">
                                <?php echo e(Form::label('email', 'Email *')); ?>

                                <?php echo e(Form::email('email', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '50'))); ?>

                            </div>
                            <div class="form-group">
                                <?php echo e(Form::label('assignment_id', 'Função *', array('class' => 'control-label'))); ?>

                                <br>
                                <?php echo e(Form::select('assignment_id', $assignmentsForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => ''])); ?>

                            </div>  
                            <div class="form-group">
                                <?php echo e(Form::label('roles[]', 'Perfil *')); ?>

                                <br>
                                <?php echo e(Form::select('roles[]', $rolesForSelect, old('roles[]'), ['class' => "form-control select2-multi", 'multiple' => 'multiple', 'style' => 'width:100%;', 'required' => ''])); ?>

                            </div>   
                            <div class="form-group">
                                <?php echo e(Form::label('block', 'Bloqueado *', array('class' => 'control-label'))); ?>

                                <br>
                                <?php echo e(Form::select('block', ['S' => 'Sim', 'N' => 'Não'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => ''])); ?>

                            </div> 
                        </div>   
                    </div>
                    <hr>
                    <div class=text-right>
                        <?php echo e(Form::submit('Alterar', ['class' => 'btn btn-primary button-prevent-multiple-submits'])); ?>

                        <?php echo e(Form::submit("Sair", ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])); ?>

                    </div> 
                <?php echo e(Form::close()); ?>         
            </div>
        </div>
    </div>
</div>