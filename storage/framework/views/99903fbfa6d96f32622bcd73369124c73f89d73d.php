<?php $__env->startSection('content'); ?>


    <?php if(Auth::user()->assignment_id == 1): ?>

    
    <?php endif; ?>


	<?php if(Auth::user()->assignment_id == 2): ?>

	
	<?php endif; ?>


	<?php if(Auth::user()->assignment_id == 3): ?>
      
            <div class="col-lg-4 col-xs-4">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>12</h3>
                        <p>TURMAS</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-plus-circled"></i>
                    </div>
                    <a href="#" class="small-box-footer"><h4><b><span class="fa fa-hand-o-right"></span> Gerenciar Turmas </b></h4></a>
                </div>
            </div>
        
        
            <div class="col-lg-4 col-xs-4">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>2</h3>
                        <p>ATIVIDADES</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ribbon-b"></i>
                    </div>
                    <a href="#" class="small-box-footer"><h4><b><span class="fa fa-hand-o-right"></span> Gerenciar Atividades </b></h4></a>
                </div>
            </div>
        
	<?php endif; ?>


    <?php if(Auth::user()->assignment_id == 4): ?>

    
    <?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>