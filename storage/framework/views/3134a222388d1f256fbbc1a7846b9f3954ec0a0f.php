<?php $__env->startSection('content'); ?>
    <?php 
      $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
      if(isset($_POST['texto']) || isset($_GET['texto']) ) {    
        $_POST['texto'] = isset($_POST['texto']) ? $_POST['texto'] : $_GET['texto'];
        $_GET['texto'] =  $_POST['texto'];
      }
     ?>

    <div class="col-md-12 col-sm-12 col-xs-12  table-responsive">			
        <div class="x_title">
            <a href="#pdf" data-toggle="modal" class="btn <?php echo e(config('adminlte.botaoImprimir')); ?>"> 
                <span class="fa fa-print"></span> Imprimir
            </a>        
            <a href="<?php echo e(route('home')); ?>" data-toggle="modal" class="btn <?php echo e(config('adminlte.botaoImprimir')); ?>"> 
                <span class="fa fa-sign-out"></span> Sair
            </a>  
            <form class="navbar-form navbar-right" role="search" action="<?php echo e(route('accesses.search')); ?>" method="post">
                <div class="form-group">
                    <?php echo e(csrf_field()); ?>

                    <input type="text" name="texto" class="form-control" placeholder="Pesquisar">
                    <?php echo e(Form::hidden('page', $_GET['page'], array('class' => 'form-control', 'required' => ''))); ?>

                    <?php echo e(Form::hidden('pesquisa', 'Sim', array('class' => 'form-control', 'required' => ''))); ?>

                </div>    
                <button type="submit" class="btn <?php echo e(config('adminlte.botaoPesquisar')); ?>"><span class="fa fa-search-plus"></span> Pesquisar</button>
            </form>
        </div> 

        <table class="table table-bordered table-striped">
            <tr>
                <th>Usuário</th>
                <th>Data/Hora</th>
                <th>IP</th>
                <th>Ação</th>
            </tr>
            <?php $__empty_1 = true; $__currentLoopData = $accesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $access): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><a href="#show<?php echo e($access->user_id); ?>" data-toggle="modal"><?php echo e($access->name); ?></a></td>
                    <td> <?php echo (new DateTime($access->datetime))->format('d/m/Y H:i'); ?></td>
                    <td><?php echo e($access->ip); ?></td>
                    <td><?php echo e($access->typeAccess($access->action)); ?></td>
                    <?php echo $__env->make('painel.administrador.accesses.modals.show.modal_show', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="90">
                        <p>Nenhum Resultado</p>
                    </td>
                </tr>
            <?php endif; ?> 
        </table>
        <?php echo e($accesses->appends(request()->except('_token'))->links()); ?> 
    </div>   
    <?php echo $__env->make('painel.administrador.accesses.modals.pdf.modal_pdf', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>