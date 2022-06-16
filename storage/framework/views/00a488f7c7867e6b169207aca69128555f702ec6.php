<div class="modal fade" id="ler<?php echo e($messageReceiver->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>ATENÇÃO</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::model($messageReceiver, ['route' => ['messages.lerMensagem', $messageReceiver->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT'])); ?>

                    <h4 class="modal-title text-center"><b>Deseja marcar a mensagem como lida?</b></h4>
                    <hr>
                    <div class=text-right>
                        <?php echo e(Form::submit('SIM', ['class' => 'btn btn-primary button-prevent-multiple-submits'])); ?>

                        <?php echo e(Form::submit('NÃO', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])); ?>

                    </div>
                <?php echo e(Form::close()); ?>                 
            </div>
        </div>
    </div>
</div>
