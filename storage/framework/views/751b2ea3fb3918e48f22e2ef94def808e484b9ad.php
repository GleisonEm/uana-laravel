<div class="modal fade" id="destroy<?php echo e($course->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Exclusão de Curso</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::open(['route' => ['courses.destroy', $course->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'DELETE'])); ?>

                    <p><b>Instituição:</b> <?php echo e($course->institute->name); ?></p>
                    <p><b>Curso: <span style="color:blue"> <?php echo e($course->name); ?></span></b></p>
                    <p><b>Criado por:</b> <?php echo e($course->created_by); ?> <b>em</b> <?php echo (new DateTime($course->created_at))->format('d/m/Y H:i'); ?></p>
                    <p><b>Alterado por:</b> <?php echo e($course->updated_by); ?> <b>em</b> <?php echo (new DateTime($course->updated_at))->format('d/m/Y H:i'); ?></p>
                    <hr>
                    <div class=text-right>
                        <?php echo e(Form::submit("Excluir", ['class' => 'btn btn-primary button-prevent-multiple-submits'])); ?>

                        <?php echo e(Form::submit("Sair", ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])); ?>

                    </div> 
                <?php echo e(Form::close()); ?> 
            </div>
        </div>
    </div>
</div> 