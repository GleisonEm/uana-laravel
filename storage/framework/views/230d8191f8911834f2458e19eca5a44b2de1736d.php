<div class="modal fade" id="responder<?php echo e($messageReceiver->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Responder à <?php echo e($messageReceiver->usuarioSender->name); ?></b></h4>
            </div>
            <div class="modal-body">  
                <?php echo e(Form::open(['route' => 'messages.responderMensagem', 'class' => 'form form-prevent-multiple-submits'])); ?>

                    <?php echo e(Form::hidden('user_sender', $messageReceiver->user_sender, array('class' => 'form-control', 'required' => ''))); ?>

                    <?php echo e(Form::hidden('id', $messageReceiver->id, array('class' => 'form-control', 'required' => ''))); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('message', 'Mensagem *')); ?>

                        <?php echo e(Form::textarea('message', null, array('class' => 'form-control', 'style' => 'resize:none', 'required' => '', 'rows' => '5', 'maxlength' => '500'))); ?>

                    </div>  

                    <hr>
                    <div class=text-right>
                        <?php echo e(Form::submit('Enviar', ['class' => 'btn btn-primary button-prevent-multiple-submits'])); ?>

                        <?php echo e(Form::submit('Sair', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])); ?>

                    </div>           
                <?php echo e(Form::close()); ?>   
            </div>
        </div>
    </div>
</div>
