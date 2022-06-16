<?php $__env->startSection('content'); ?>

      
            <div class="col-lg-4 col-xs-4">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <p>Total de Turmas</p>
                        <h3><?php echo e($total_turmas); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-plus-circled"></i>
                    </div>
                    <a href="<?php echo e(route('teams.index')); ?>" class="small-box-footer"><h4><b><span class="fa fa-hand-o-right"></span> Gerenciar Turmas </b></h4></a>
                </div>
            </div>
        
        
        

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>