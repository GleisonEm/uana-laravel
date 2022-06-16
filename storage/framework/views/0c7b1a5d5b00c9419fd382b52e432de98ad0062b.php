<?php 
    $url_anterior = URL::previous(); 
 ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
        <div class="x_title">
            <a href=#" data-toggle="modal" class="btn <?php echo e(config('adminlte.botaoCadastrar')); ?>" target="_blank"> 
                <span class="fa fa-print"></span> Imprimir
            </a>   

            <a href="<?php echo e(isset($url) ? $url : $url_anterior); ?>" data-toggle="modal" class="btn <?php echo e(config('adminlte.botaoCadastrar')); ?>"> 
                <span class="fa fa-mail-reply"></span> Voltar
            </a>        
        </div>  
        <br>

        <table class="table table-bordered table-striped">
            <tr>
                <th>Alunos</th>
                <th>Ações</th>
            </tr>
            <?php $__empty_1 = true; $__currentLoopData = $team_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($team_user->retorna_usuario($team_user->user_id)); ?></td>
                    <td width="1%" nowrap>
                        <a href="#" data-toggle="modal" class="btn btn-xs <?php echo e(config('adminlte.botaoAlterar')); ?>">
                            <span class="fa fa-trash"></span> Excluir Aluno
                        </a>
                        <a href="#" data-toggle="modal" class="btn btn-xs <?php echo e(config('adminlte.botaoAlterar')); ?>">
                            <span class="fa fa-share-square-o"></span> Atividades
                        </a>                         
                        <a href="#" data-toggle="modal" class="btn btn-xs <?php echo e(config('adminlte.botaoAlterar')); ?>">
                            <span class="fa fa-send"></span> Postagens
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="90">
                        <p>Nenhum Aluno</p>
                    </td>
                </tr>
            <?php endif; ?> 
        </table>
        <?php echo $team_users->links(); ?> 
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>