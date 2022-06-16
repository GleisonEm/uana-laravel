<div class="modal fade" id="update<?php echo e($role->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Alteração de Perfil</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::model($role, ['route' => ['roles.update', $role->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT'])); ?>

                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-5">
                            <div class="form-group">
                                <?php echo e(Form::label('name', 'Nome *')); ?>

                                <?php echo e(Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '50'))); ?>

                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group">
                                <?php echo e(Form::label('description', 'Descrição *')); ?>

                                <?php echo e(Form::text('description', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100'))); ?>

                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <?php echo e(Form::label('permissions[]', 'Permissões *')); ?>

                            <br>
                            <?php echo e(Form::select('permissions[]', $permissionsForSelect, old('permissions[]'), ['class' => "form-control select2-multi", 'multiple' => 'multiple', 'style' => 'width:100%;', 'required' => ''])); ?>

                        </div>  
                    </div>
                    <hr>
                    <div class=text-right>
                        <?php echo e(Form::submit('Alterar', ['class' => 'btn btn-primary button-prevent-multiple-submits'])); ?>

                        <?php echo e(Form::submit('Sair', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])); ?>

                    </div>
                <?php echo e(Form::close()); ?>                 
            </div>
        </div>
    </div>
</div>

