<div class="modal fade" id="update<?php echo e($permission->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Alteração de Permissão</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::model($permission, ['route' => ['permissions.update', $permission->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT'])); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Nome *')); ?>

                        <?php echo e(Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '50'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('description', 'Descrição *')); ?>

                        <?php echo e(Form::text('description', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100'))); ?>

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

