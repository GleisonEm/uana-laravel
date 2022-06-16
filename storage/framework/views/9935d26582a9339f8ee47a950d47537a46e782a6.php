<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> MrdSoft Sistemas </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css')); ?>"> 
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/vendor/extra/extra2.css')); ?>"> 

<style type="text/css">
.login-page
{
    background-color: #CEECF5;
   /* background-image: url('assets/img/background_login.jpg'); */
    background-repeat: no-repeat;
    background-size:100%;
    bottom: 0;
    color: black;
    left: 0;
    overflow: auto;
    padding: 3em;
    position: absolute;
    right: 0;
    text-align: center;
    top: 0;

}
.login-page h1
{
    font-weight: 300;
}
.login-page h1 small
{
    color: gray;
}
.login-page .form-group
{
   
}
.login-page .form-content
{
    padding: 40px 0;
}
.login-cor
{
    background-image: url('assets/img/cor_form.jpg');
    background-repeat: no-repeat;
    background-size:100%;
}


</style>


</head>

<body>
<div class=login-page>

    <!--  margin-left: 38%; margin-right: 38%; -->
    <div class="container" style="margin-top: 60px;" >
      <div class="row" style="margin-top: 50px;">
        <div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2" style="margin-bottom: 50px;">

          <div class="panel panel-primary  login-cor">

            <div class="panel-body">

            <div align="center"> 
                <img src="<?php echo e(url('assets/img/logo_uana.jpg')); ?>" alt="" class="img-responsive logo">
            </div> 
            
                            
            <form action="<?php echo e(url(config('adminlte.login_url', 'login'))); ?>" method="post" class="login-cor">
                <?php echo csrf_field(); ?>


                <div class="form-group has-feedback <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                    <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>"
                           placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group has-feedback <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                    <input type="password" name="password" class="form-control"
                           placeholder="Senha">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="row login-cor" >
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-defalt btn-block btn-flat">Acessar</button>
                    </div>
                </div>
            </form>
             
             

            </div>
            <div class="panel-footer login-cor">
              <p class="text-right text-muted"><small>Desenvolvido por <a href="https://mrdsoft.com.br/" target="_blank" title="Empresa">MrdSoft Sistemas</a></small></p>
            </div>
          </div>
        </div>        
      </div>
    </div>

</div>    
    
    <script src="base/jquery/jquery.min.js"></script>  
                     
<script src="<?php echo e(asset('vendor/adminlte/vendor/jquery/dist/jquery2.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/adminlte/vendor/jquery/dist/jquery.inputmask.js')); ?>"></script>



<script src="<?php echo e(asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap-datepicker.min.js')); ?>"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>



</body>

<?php echo $__env->make('scripts.datepicker', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('scripts.mascaras', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</html>


 
