<?php $__env->startSection('content'); ?>
    <?php 
      $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
      if(isset($_POST['texto']) || isset($_GET['texto']) ) {    
        $_POST['texto'] = isset($_POST['texto']) ? $_POST['texto'] : $_GET['texto'];
        $_GET['texto'] =  $_POST['texto'];
      }
     ?>


    <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
        <br>
        <a href="#store" data-toggle="modal" class="btn <?php echo e(config('adminlte.botaoCadastrar')); ?>"> 
            <span class="fa fa-send"></span> Compartilhe algo com a turma
        </a>
        <a href="<?php echo e(route('home')); ?>" data-toggle="modal" class="btn <?php echo e(config('adminlte.botaoImprimir')); ?>"> 
            <span class="fa fa-sign-out"></span> Sair
        </a> 
        <hr>
        <table class="table table-bordered table-striped">
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <div class="box-header with-border">
                            <div class="user-block">
                                <img class="img-circle" src="<?php echo e(url('assets/uploads/avatars', $post->user->avatar)); ?>">
                                <span class="username"><a href="#"><?php echo e($post->user->name); ?></a></span>
                                <span class="description">Compartinhamento - <?php echo (new DateTime($post->created_at))->format('d/m/Y H:i'); ?></span>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="attachment-block clearfix">
                                <?php if($post->user_id == Auth::user()->id): ?>
                                    <h4 class="attachment-heading"><a href="#update<?php echo e($post->id); ?>" data-toggle="modal"><?php echo e($post->titulo); ?></a></h4>
                                <?php else: ?>
                                    <h4 class="attachment-heading"><a href="#" data-toggle="modal"><?php echo e($post->titulo); ?></a></h4>
                                <?php endif; ?>
                                <br>
                                <img src="<?php echo e(url('assets/img/posts', $post->id.'-'.$post->imagem)); ?>" style="width:300px; height:200px;" alt="Attachment Image">
                                <br>
                                <br>
                                <p align="justify"><?php echo e($post->conteudo); ?></p>
                            </div>

                            <a href="#" class="btn btn-xs btn-default">
                                <span class="fa fa-share"></span> Compartilhar
                            </a>                            
                                
                            <?php if($post->verificaLikes($post->id)): ?>
                                <a href="<?php echo e(route('posts.like', [$post->team_id, $post->id])); ?>" class="btn btn-xs btn-default">
                                    <span class="fa fa-thumbs-o-up"></span> Like
                                </a>
                            <?php else: ?>
                                <a href="#" class="btn btn-xs btn-primary">
                                    <span class="fa fa-thumbs-o-up"></span> Like
                                </a>
                            <?php endif; ?>
                            
                            <?php if($post->verificaComentarios($post->id)): ?>
                                <a href="#comment<?php echo e($post->id); ?>" data-toggle="modal" class="btn btn-xs btn-default">
                                    <span class="fa fa-comment-o"></span> Comentar
                                </a>
                            <?php else: ?>
                                <a href="#comment<?php echo e($post->id); ?>" data-toggle="modal" class="btn btn-xs btn-primary">
                                    <span class="fa fa-comment-o"></span> Comentar
                                </a>
                            <?php endif; ?>
                            <span class="pull-right text-muted"><?php echo e($post->numeroLikes($post->id)); ?> - <?php echo e($post->numeroComentarios($post->id)); ?></span>
                        </div>

                    <!--    <div class="box-footer box-comments">
                            <div class="box-comment">
                                <img class="img-circle img-sm" src="<?php echo e(url('assets/uploads/avatars', $post->user->avatar)); ?>" alt="User Image">
                                <div class="comment-text">
                                    <span class="username">Maria Gonzale
                                        <span class="text-muted pull-right">8:03 PM Today</span>
                                    </span>
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                </div>
                            </div>
                        </div>  -->

                        <?php echo $__env->make('painel.posts.modals.update.modal_update', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                    
                        <?php echo $__env->make('painel.posts.modals.comment.modal_comment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                    
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="90">
                        <p>Nenhum Compartilhamento</p>
                    </td>
                </tr>
            <?php endif; ?> 
        </table>
        <?php echo e($posts->appends(request()->except('_token'))->links()); ?> 
    </div>

</div>

    <?php echo $__env->make('painel.posts.modals.store.modal_store', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>