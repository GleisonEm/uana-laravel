<div class="modal fade" id="show<?php echo e($role->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Dados do Perfil</b></h4>
            </div>
            <div class="modal-body">
                <p><b>Nome: <span style="color:blue"> <?php echo e($role->name); ?></span></b></p>
                <p><b>Descrição:</b> <?php echo e($role->description); ?></p>
                <p><b>Criado por:</b> <?php echo e($role->created_by); ?> <b>em</b> <?php echo (new DateTime($role->created_at))->format('d/m/Y H:i'); ?></p>
                <p><b>Alterado por:</b> <?php echo e($role->updated_by); ?> <b>em</b> <?php echo (new DateTime($role->updated_at))->format('d/m/Y H:i'); ?></p>
                <hr>
                <div class=text-right>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                </div> 
            </div>
        </div>
    </div>
</div>
