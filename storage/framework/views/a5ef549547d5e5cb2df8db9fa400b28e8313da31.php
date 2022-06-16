<div class="modal fade" id="show<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Dados do Usuário</b></h4>
            </div>
            <div class="modal-body">
                <p><b>CPF:</b> <?php echo e($user->cpf); ?></p>
                <p><b>Nome: <span style="color:blue"> <?php echo e($user->name); ?></span></b></p>
                <p><b>E-mail:</b> <?php echo e($user->email); ?></p>
                <p><b>Criado por:</b> <?php echo e($user->created_by); ?> <b>em</b> <?php echo (new DateTime($user->created_at))->format('d/m/Y H:i'); ?></p>
                <p><b>Alterado por:</b> <?php echo e($user->updated_by); ?> <b>em</b> <?php echo (new DateTime($user->updated_at))->format('d/m/Y H:i'); ?></p>
                <hr>
                <div class=text-right>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                </div> 
            </div>
        </div>
    </div>
</div>
