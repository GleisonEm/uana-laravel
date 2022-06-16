<div class="modal fade" id="signature<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center"><b>Upload de Assinatura</b></h4>
            </div>
            <br>
            <div class="modal-body">
                <?php echo e(Form::model($user, ['route' => ['users.signature', $user->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                    <div class="form-group">
                        <?php echo e(Form::input('file', 'signature', 'null', array('class' => 'form-control', 'required' => ''))); ?>

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

<?php $__env->startSection('pos-script'); ?>

<script type="text/javascript">


</script>
<?php $__env->stopSection(); ?>