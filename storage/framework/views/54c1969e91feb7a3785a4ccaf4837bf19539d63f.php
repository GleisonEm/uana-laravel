<div class="modal fade" id="participar_turma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Participar da Turma</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::model(Auth::user(), ['route' => ['users.team_user'], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT'])); ?>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?php echo e(Form::label('key', 'Insira o código')); ?>

                                <?php echo e(Form::text('key', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '7'))); ?>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class=text-right>
                        <?php echo e(Form::submit("Participar", ['class' => 'btn btn-primary'])); ?>

                        <?php echo e(Form::submit("Sair", ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])); ?>

                    </div> 
                <?php echo e(Form::close()); ?>                 

            <div>
        </div>
    </div>
</div>
