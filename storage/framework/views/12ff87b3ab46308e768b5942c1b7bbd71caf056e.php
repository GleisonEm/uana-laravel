<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Documento PDF   
    </title>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/vendor/bootstrap/dist/css/pdf_relatorio.css')); ?>"> 
</head>

<body>
    
    <div class="col-md-2 col-sm-2 col-xs-2"> 
        <img src="<?php echo e(public_path() . '/assets/img/unimed.png'); ?>" alt="" class="img-responsive logo" style="width:120px; height:60px; position:absolute; top:1px; left:15px">
        <br>
    </div>   

    <p align="center"><font size="15"><b><?php echo e($title); ?></b></font></p>
    
    <div class="row">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <div class="row" align="right">
        <h5>Total de registros: <?php echo e($total); ?> </h5>
    </div>

</body>
</html>

