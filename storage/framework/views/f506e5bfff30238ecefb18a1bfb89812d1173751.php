<?php $__env->startSection('content'); ?>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Áreas</th>
        </tr>
        <?php $__empty_1 = true; $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($area->name); ?></td>
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