<?php $__env->startSection('content'); ?>


    <table class="table table-bordered table-striped">
            <?php $__empty_1 = true; $__currentLoopData = $team_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <div class="col-lg-4 col-xs-4">
                        <div class="small-box bg-olive">
                            <div class="inner">
                                <p>Turma (<?php echo e($team_user->team->key); ?>)</p>
                                <p>Professor(a): <?php echo e($team_user->retorna_usuario($team_user->team->user_id)); ?></p>
                                <h4><?php echo e($team_user->team->name); ?></h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-files-o"></i>
                            </div>
                            <a href="<?php echo e(route('posts.index', $team_user->team_id)); ?>" class="small-box-footer"><h4><b><span class="fa fa-hand-o-right"></span> Compartilhamentos </b></h4></a>
                        </div>
                    </div>  
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="90">
                        <p>Você não tem turmas !</p>
                    </td>
                </tr>
            <?php endif; ?> 
        </table>

      

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>