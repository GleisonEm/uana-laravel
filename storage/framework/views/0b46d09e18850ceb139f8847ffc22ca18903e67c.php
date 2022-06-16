<?php $__env->startSection('content'); ?>
        <table class="table table-bordered table-striped">
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Função</th>
                <th>Instituição</th>
                <th>Perfil</th>
                <th>Data de cadastro</th>
            </tr>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($user->cpf); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->assignment->name); ?></td>
                    <td><?php echo e($user->institute->name); ?></td>
                    <td><?php echo e($user->roles()->pluck('name')->implode(', ')); ?></td>
                    <td> <?php echo (new DateTime($user->created_at))->format('d/m/Y H:i'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="90">
                        <p>Nenhum Resultado</p>
                    </td>
                </tr>
            <?php endif; ?> 
        </table>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.pdf.pdf_relatorio', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>