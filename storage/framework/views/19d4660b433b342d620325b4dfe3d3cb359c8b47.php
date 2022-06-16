<?php $__env->startSection('content'); ?>
    <?php 
      $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
      if(isset($_POST['texto']) || isset($_GET['texto']) ) {    
        $_POST['texto'] = isset($_POST['texto']) ? $_POST['texto'] : $_GET['texto'];
        $_GET['texto'] =  $_POST['texto'];
      }
     ?>
    <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
        <?php echo e(Form::model($user, ['route' => 'users.dadosUpdate', 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT'])); ?>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <?php echo e(Form::label('cpf', 'CPF *')); ?>

                        <?php echo e(Form::text('cpf', auth()->user()->cpf, array('class' => 'form-control mascara-cpfcnpj', 'required' => ''))); ?>

                    </div>                       
                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Nome *')); ?>

                        <?php echo e(Form::text('name', auth()->user()->name, array('class' => 'form-control', 'required' => '', 'maxlength' => '50'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('email', 'Email *')); ?>

                        <?php echo e(Form::email('email', auth()->user()->email, array('class' => 'form-control', 'required' => '', 'maxlength' => '50'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('tags', 'Áreas de interesse')); ?>

                        <br>
                        <?php echo e(Form::text('tags', auth()->user()->tags, array('class' => 'form-control', 'data-role' => 'tagsinput'))); ?>

                    </div>

                </div>   
            </div>
            <hr>
            <div class=text-right>
                <?php echo e(Form::submit('Alterar', ['class' => 'btn btn-primary button-prevent-multiple-submits'])); ?>

                <a href="<?php echo e(route('home')); ?>" data-toggle="modal" class="btn btn-default"> 
                    <span class="fa fa-sign-out"></span> Sair
                </a>  
            </div> 
        <?php echo e(Form::close()); ?>        
    </div> 

    <div>
        <table class="table table-bordered table-striped">
        <tr>
            <th>Função</th>
        </tr>
        <?php $__empty_1 = true; $__currentLoopData = $array_tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
            <!--    <?php $__empty_2 = true; $__currentLoopData = $array_tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    <?php if(stripos($teste, 'marcio') !== FALSE): ?>  -->

                        <td><?php echo e($post); ?></td>
                <!--    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                
                <?php endif; ?>  -->
                
                 
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="90">
                    <p>Nenhum Resultado</p>
                </td>
            </tr>
        <?php endif; ?> 
        </table>
    </div>


<?php $__env->stopSection(); ?>



    

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>