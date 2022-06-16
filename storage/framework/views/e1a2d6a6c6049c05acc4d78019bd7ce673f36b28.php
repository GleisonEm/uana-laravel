<div class="modal fade" id="destroy<?php echo e($area->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Exclusão de Área de Conhecimento</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::open(['route' => ['areas.destroy', $area->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'DELETE'])); ?>

                    <p><b>Nome: <span style="color:blue"> <?php echo e($area->name); ?></span></b></p>
                    <p><b>Criado por:</b> <?php echo e($area->created_by); ?> <b>em</b> <?php echo (new DateTime($area->created_at))->format('d/m/Y H:i'); ?></p>
                    <p><b>Alterado por:</b> <?php echo e($area->updated_by); ?> <b>em</b> <?php echo (new DateTime($area->updated_at))->format('d/m/Y H:i'); ?></p>
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