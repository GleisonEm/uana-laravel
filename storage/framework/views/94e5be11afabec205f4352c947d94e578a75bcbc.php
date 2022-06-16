<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo $__env->yieldContent('title_prefix', config('adminlte.title_prefix', '')); ?>
        <?php echo e(isset($title) ? $title : 'Painel'); ?>

        <?php echo $__env->yieldContent('title_postfix', config('adminlte.title_postfix', '')); ?>
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css')); ?>"> 
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap-datepicker.css')); ?>"> 
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css')); ?>">

    <?php if(config('adminlte.plugins.select2')): ?>
        <!-- Select2 -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    <?php endif; ?>

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/dist/css/AdminLTE.min.css')); ?>">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"  >

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <?php if(config('adminlte.plugins.datatables')): ?>
        <!-- DataTables -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <?php endif; ?>

   <link rel="stylesheet" href="<?php echo e(asset('css/submit.css')); ?>"> 



    <?php echo $__env->yieldContent('adminlte_css'); ?>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
</head>
<body class="hold-transition <?php echo $__env->yieldContent('body_class'); ?>">

<?php echo $__env->yieldContent('body'); ?>

<script src="<?php echo e(asset('vendor/adminlte/vendor/jquery/dist/jquery2.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/adminlte/vendor/jquery/dist/jquery.inputmask.js')); ?>"></script>

<!-- Bootstrap 3.3.6 
<link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap3.3.6.min.css')); ?>"> --> 

<script src="<?php echo e(asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap-datepicker.pt-BR.min.js')); ?>"></script>

<?php if(config('adminlte.plugins.select2')): ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<?php endif; ?>

<?php if(config('adminlte.plugins.datatables')): ?>
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<?php endif; ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<?php echo $__env->yieldContent('adminlte_js'); ?>

<script src="<?php echo e(asset('js/submit.js')); ?>"></script>

</body>

<!-- Pasta de scripts -->
<?php echo $__env->make('scripts.mascaras', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('scripts.alert_close', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('scripts.select2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('scripts.datepicker', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</html>
