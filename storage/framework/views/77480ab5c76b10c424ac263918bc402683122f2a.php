<?php $__env->startSection('content'); ?>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Instituto</th>
            <th>Curso</th>
            <th>Professores</th>
        </tr>
        <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($course->institute->name); ?></td>
                <td><?php echo e($course->name); ?></td>
                <td><?php echo e($course->users()->pluck('name')->implode(', ')); ?></td>
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