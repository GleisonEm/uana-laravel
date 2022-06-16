<div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Cadastro de Turma</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::open(['route' => 'teams.store', 'class' => 'form form-prevent-multiple-submits'])); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('course_id', 'Curso *', array('class' => 'control-label'))); ?>

                        <?php echo e(Form::select('course_id', $coursesForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => ''])); ?>

                    </div>  
                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Turma *')); ?>

                        <?php echo e(Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '60'))); ?>

                    </div>
                    <hr>
                    <div class=text-right>
                        <?php echo e(Form::submit('Cadastrar', ['class' => 'btn btn-primary button-prevent-multiple-submits'])); ?>

                        <?php echo e(Form::submit('Sair', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])); ?>

                    </div>           
                <?php echo e(Form::close()); ?>   
            </div>
        </div>
    </div>
</div>
