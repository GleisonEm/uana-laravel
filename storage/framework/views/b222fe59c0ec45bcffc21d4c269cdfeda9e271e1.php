<div class="modal fade" id="comment<?php echo e($post->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Comentar Publicação</b></h4>
            </div>
            <div class="modal-body">
                <?php echo e(Form::model($post, ['route' => ['posts.comment', $post->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT'])); ?>

                    <?php echo e(Form::hidden('team_id', $team_id, array('class' => 'form-control'))); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('comment', 'Comentário')); ?>

                        <?php echo e(Form::textarea('comment', null, array('class' => 'form-control', 'style' => 'resize:none', 'rows' => '5', 'required' => '', 'maxlength' => '280'))); ?>

                    </div> 
                    <hr>
                    <div class=text-right>
                        <?php echo e(Form::submit('Comentar', ['class' => 'btn btn-primary button-prevent-multiple-submits'])); ?>

                        <?php echo e(Form::submit('Sair', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])); ?>

                    </div>
                <?php echo e(Form::close()); ?>                 
            </div>
        </div>
    </div>
</div>

