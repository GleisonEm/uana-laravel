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
                            <!--    <p><?php echo e($post->conteudo); ?>... <a href="http://www.lipsum.com/"> Mais</a></p>  -->
                            <p align="justify"><?php echo e($post->conteudo); ?></p>
                            </div>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Comentário</button>
                            <span class="pull-right text-muted">45 likes - 2 comentários</span>
                        </div>
                        <?php echo $__env->make('painel.cadastros.posts.modals.update.modal_update', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                    

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

    <?php echo $__env->make('painel.cadastros.posts.modals.store.modal_store', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>