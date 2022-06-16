<div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Compartilhamento</b></h4>
            </div>
            <div class="modal-body">

                <?php
                //valores retornado do BD
                    $cidades = "Curitiba, Fortaleza, Porto Alegre";
                ?>
                
                <?php echo e(Form::open(['route' => 'posts.store', 'class' => 'form form-prevent-multiple-submits', 'enctype' => 'multipart/form-data'])); ?>

                    <?php echo e(Form::hidden('team_id', $team_id, array('class' => 'form-control'))); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('titulo', 'Título *')); ?>

                        <?php echo e(Form::text('titulo', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '60'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('subtitulo', 'Subtítulo *')); ?>

                        <?php echo e(Form::text('subtitulo', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '60'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('conteudo', 'Conteúdo')); ?>

                        <?php echo e(Form::textarea('conteudo', null, array('class' => 'form-control', 'style' => 'resize:none', 'rows' => '5', 'maxlength' => '280', 'required' => ''))); ?>

                    </div> 

                    <div class="form-group">
                        <label>Imagem</label>
                        <input type="file" name="imagem" class="form-control">
                    </div>                    
                    <div class="form-group">
                        <?php echo e(Form::label('tags', 'Tags associadas')); ?>

                        <br>
                        <?php echo e(Form::text('tags', null, array('class' => 'form-control', 'data-role' => 'tagsinput'))); ?>

                    </div>
                    <hr>
                    <div class=text-right>
                        <?php echo e(Form::submit('Publicar', ['class' => 'btn btn-primary button-prevent-multiple-submits'])); ?>

                        <?php echo e(Form::submit('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])); ?>

                    </div>           
                <?php echo e(Form::close()); ?>   
            </div>
        </div>
    </div>
</div>
