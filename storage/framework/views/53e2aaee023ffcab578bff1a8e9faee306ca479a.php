<div class="modal fade" id="show<?php echo e($institute->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Dados da Instituição</b></h4>
            </div>
            <div class="modal-body">
                <p><b>Nome: <span style="color:blue"> <?php echo e($institute->name); ?></span></b></p>
                <p><b>Criado por:</b> <?php echo e($institute->created_by); ?> <b>em</b> <?php echo (new DateTime($institute->created_at))->format('d/m/Y H:i'); ?></p>
                <p><b>Alterado por:</b> <?php echo e($institute->updated_by); ?> <b>em</b> <?php echo (new DateTime($institute->updated_at))->format('d/m/Y H:i'); ?></p>
                <hr>
                <div class=text-right>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                </div> 
            </div>
        </div>
    </div>
</div>
