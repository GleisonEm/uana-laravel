<?php $__env->startSection('content'); ?>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Turma</th>
            <th>Curso</th>
        </tr>
        <?php $__empty_1 = true; $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($team->name); ?></td>
                <td><?php echo e($team->course->name); ?></td>
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