<div class="modal fade" id="redefinir_senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Redefinição de Senha</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::model(Auth::user(), ['route' => ['users.password', Auth::user()->id], 'class' => 'form', 'method' => 'put'])); ?>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <?php echo e(Form::label('password', 'Nova Senha *')); ?><br>
                                <?php echo e(Form::password('password', array('class' => 'form-control', 'required' => '', 'minlength' => '6', 'maxlength' => '10'))); ?>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <?php echo e(Form::label('password', 'Confirmar Senha *')); ?><br>
                                <?php echo e(Form::password('password_confirmation', array('class' => 'form-control', 'required' => '', 'minlength' => '6', 'maxlength' => '10'))); ?>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class=text-right>
                        <?php echo e(Form::submit("Redefinir", ['class' => 'btn btn-primary'])); ?>

                        <?php echo e(Form::submit("Sair", ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])); ?>

                    </div> 
                <?php echo e(Form::close()); ?> 
            <div>
        </div>
    </div>
</div>
