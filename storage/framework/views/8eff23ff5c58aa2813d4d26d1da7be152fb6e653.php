<div class="modal fade" id="show<?php echo e($access->user_id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Dados do Acesso</b></h4>
            </div>
            <div class="modal-body">
                <p><b>Data/Hora:</b> <?php echo (new DateTime($access->datetime))->format('d/m/Y H:i'); ?> </p>
                <p><b>Usuário:</b> <?php echo e($access->name); ?> </p>
                <p><b>IP:</b> <?php echo e($access->ip); ?> </p>
                <p><b>Ação:</b> <?php echo e($access->typeAccess($access->action)); ?> </p>
                <p><b>Criado por:</b> <?php echo e($access->created_by); ?> <b>em</b> <?php echo (new DateTime($access->created_at))->format('d/m/Y H:i'); ?></p>
                <p><b>Alterado por:</b> <?php echo e($access->updated_by); ?> <b>em</b> <?php echo (new DateTime($access->updated_at))->format('d/m/Y H:i'); ?></p>
                <hr>
                <div class=text-right>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                </div> 
            </div>
        </div>
    </div>
</div>
