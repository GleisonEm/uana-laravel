<div class="modal fade" id="destroy<?php echo e($assignment->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Exclusão de Função</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::open(['route' => ['assignments.destroy', $assignment->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'DELETE'])); ?>

                    <p><b>Nome: <span style="color:blue"> <?php echo e($assignment->name); ?></span></b></p>
                    <p><b>Chave:</b> <?php echo e($assignment->key); ?></p>
                    <p><b>Criado por:</b> <?php echo e($assignment->created_by); ?> <b>em</b> <?php echo (new DateTime($assignment->created_at))->format('d/m/Y H:i'); ?></p>
                    <p><b>Alterado por:</b> <?php echo e($assignment->updated_by); ?> <b>em</b> <?php echo (new DateTime($assignment->updated_at))->format('d/m/Y H:i'); ?></p>
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