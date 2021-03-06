<div class="modal fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Imprimir Dados</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::open(['route' => 'courses.pdf', 'class' => 'form', 'target' => '_blank'])); ?>

                    <div class="form-group">
                        <?php echo e(Form::select('institute_id', $institutesForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder' => 'TODAS AS INSTITUIÇÕES'])); ?>

                    </div>                    
                    <div class="form-group">
                        <?php echo e(Form::text('texto', null, array('class' => 'form-control', 'placeholder' => 'Pesquisar'))); ?>

                    </div>
                    <hr>
                    <div class=text-right>
                        <?php echo e(Form::submit('Imprimir', ['class' => 'btn btn-primary'])); ?>

                        <?php echo e(Form::submit('Sair', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])); ?>

                    </div>         
                <?php echo e(Form::close()); ?>   
            </div>
        </div>
    </div>
</div>
