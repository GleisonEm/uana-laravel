<div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Cadastro de Mensagem</b></h4>
            </div>
            <div class="modal-body">  
                <?php echo e(Form::open(['route' => 'messages.store', 'class' => 'form form-prevent-multiple-submits'])); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('message', 'Mensagem *')); ?>

                        <?php echo e(Form::textarea('message', null, array('class' => 'form-control', 'style' => 'resize:none', 'required' => '', 'rows' => '5', 'maxlength' => '500'))); ?>

                    </div>  

                    <div class="form-group">
                        <?php echo e(Form::label('user_receiver', 'Para *', array('class' => 'control-label'))); ?>

                        <?php echo e(Form::select('user_receiver', $usersForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => ''])); ?>

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
