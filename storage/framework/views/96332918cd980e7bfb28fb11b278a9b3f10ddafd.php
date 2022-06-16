<?php $__env->startSection('content'); ?>
    <?php 
      $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
      if(isset($_POST['texto']) || isset($_GET['texto']) ) {    
        $_POST['texto'] = isset($_POST['texto']) ? $_POST['texto'] : $_GET['texto'];
        $_GET['texto'] =  $_POST['texto'];
      }
     ?>

    <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
        <div class="x_title">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cadastros_funcoes_cadastrar')): ?>        
                <a href="#store" data-toggle="modal" class="btn <?php echo e(config('adminlte.botaoCadastrar')); ?>"> 
                    <span class="fa fa-plus"></span> Cadastrar
                </a>
            <?php endif; ?> 
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cadastros_funcoes_imprimir')): ?>        
                <a href="#pdf" data-toggle="modal" class="btn <?php echo e(config('adminlte.botaoImprimir')); ?>"> 
                    <span class="fa fa-print"></span> Imprimir
                </a>        
            <?php endif; ?> 
            <a href="<?php echo e(route('home')); ?>" data-toggle="modal" class="btn <?php echo e(config('adminlte.botaoImprimir')); ?>"> 
                <span class="fa fa-sign-out"></span> Sair
            </a>  
            <form class="navbar-form navbar-right" role="search" action="<?php echo e(route('assignments.search')); ?>" method="post">
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
                <th>Função</th>
                <th>Chave</th>
                <th>Ações</th>
            </tr>
            <?php $__empty_1 = true; $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><a href="#show<?php echo e($assignment->id); ?>" data-toggle="modal"><?php echo e($assignment->name); ?></a></td>
                    <td><?php echo e($assignment->key); ?></td>
                    <td width="1%" nowrap>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cadastros_funcoes_alterar')): ?>
                            <a href="#update<?php echo e($assignment->id); ?>" data-toggle="modal" class="btn btn-xs <?php echo e(config('adminlte.botaoAlterar')); ?>">
                                <span class="fa fa-pencil"></span> Alterar
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cadastros_funcoes_excluir')): ?>
                            <a href="#destroy<?php echo e($assignment->id); ?>" data-toggle="modal" class="btn btn-xs <?php echo e(config('adminlte.botaoExcluir')); ?>">
                                <span class="fa fa-trash"></span> Excluir
                            </a> 
                        <?php endif; ?>    
                        <?php echo $__env->make('painel.cadastros.assignments.modals.show.modal_show', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('painel.cadastros.assignments.modals.update.modal_update', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('painel.cadastros.assignments.modals.destroy.modal_destroy', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="90">
                        <p>Nenhum Resultado</p>
                    </td>
                </tr>
            <?php endif; ?> 
        </table>
        <?php echo e($assignments->appends(request()->except('_token'))->links()); ?> 
    </div>
    <?php echo $__env->make('painel.cadastros.assignments.modals.store.modal_store', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('painel.cadastros.assignments.modals.pdf.modal_pdf', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>