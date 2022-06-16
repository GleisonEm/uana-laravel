<div class="modal fade" id="update<?php echo e($course->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Alteração de Curso</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::model($course, ['route' => ['courses.update', $course->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT'])); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('institute_id', 'Instituição *', array('class' => 'control-label'))); ?>

                        <br>
                        <?php echo e(Form::select('institute_id', $institutesForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => ''])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Curso *')); ?>

                        <?php echo e(Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '60'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('users[]', 'Professores')); ?>

                        <br>
                        <?php echo e(Form::select('users[]', $usersForSelect, old('users[]'), ['class' => "form-control select2-multi", 'multiple' => 'multiple', 'style' => 'width:100%;'])); ?>

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

