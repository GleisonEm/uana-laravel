<?php $__env->startSection('content'); ?>
    <?php 
      $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
      if(isset($_POST['texto']) || isset($_GET['texto']) ) {    
        $_POST['texto'] = isset($_POST['texto']) ? $_POST['texto'] : $_GET['texto'];
        $_GET['texto'] =  $_POST['texto'];
      }
     ?>
        <a href="<?php echo e(route('home')); ?>" data-toggle="modal" class="btn <?php echo e(config('adminlte.botaoImprimir')); ?>"> 
            <span class="fa fa-sign-out"></span> Sair
        </a>
        <hr>                        
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab"><h4><b style="color:#0077b3"><i class="fa fa-cloud-download"></i> Mensagens Recebidas</b></h4></a></li>
                <li><a href="#tab_2" data-toggle="tab"><h4><b style="color:#bf4040"><i class="fa  fa-cloud-upload"></i> Enviar Mensagens</b></h4></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="x_title">
                        <form class="navbar-form navbar-right" role="search" action="<?php echo e(route('messages.search')); ?>" method="post">
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
                            <th>De</th>
                            <th>Mensagem</th>
                            <th>Data</th>
                            <th>Situação</th>
                            <th>Ações</th>
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $messagesReceiver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $messageReceiver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php if($messageReceiver->status == 'A'): ?>
                                <?php  $color = '#0077b3'  ?>
                            <?php else: ?>
                                <?php  $color = '#b3b3b3'  ?>
                            <?php endif; ?>
                            <tr style='color:<?php echo e($color); ?>'>
                                <td width="10%" nowrap><?php echo e($messageReceiver->usuarioSender->name); ?></td>
                                <td><?php echo e($messageReceiver->message); ?></td>
                                <td width="8%" nowrap> <?php echo (new DateTime($messageReceiver->datetime))->format('d/m/Y H:i'); ?></td>
                                <td width="5%" nowrap><?php echo e($messageReceiver->statusMessage($messageReceiver->status)); ?></td>
                                <td style='color:black' width="1%" nowrap>
                                   
                                        <?php if($messageReceiver->status == 'A'): ?>
                                            <a href="#ler<?php echo e($messageReceiver->id); ?>" data-toggle="modal" class="btn btn-xs <?php echo e(config('adminlte.botaoAlterar')); ?>">
                                                <span class="fa fa-trash"></span> Marcar como lida
                                            </a> 
                                        <?php endif; ?>
                                
                                    
                                        <a href="#responder<?php echo e($messageReceiver->id); ?>" data-toggle="modal" class="btn btn-xs <?php echo e(config('adminlte.botaoAlterar')); ?>">
                                            <span class="fa fa-edit"></span> Responder
                                        </a> 
                                
                                    <?php echo $__env->make('painel.cadastros.messages.modals.responder.modal_responder', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php echo $__env->make('painel.cadastros.messages.modals.ler.modal_ler', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                    <?php echo e($messagesReceiver->appends(request()->except('_token'))->links()); ?> 
                </div>
                
                <div class="tab-pane" id="tab_2">
                    <div class="x_title">
                      
                            <a href="#store" data-toggle="modal" class="btn <?php echo e(config('adminlte.botaoCadastrar')); ?>"> 
                                <span class="fa fa-plus"></span> Nova Mensagem
                            </a>
                    
                        <form class="navbar-form navbar-right" role="search" action="<?php echo e(route('messages.search')); ?>" method="post">
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
                            <th>Para</th>
                            <th>Mensagem</th>
                            <th>Data</th>
                            <th>Situação</th>                            
                        </tr>
                        <?php $__empty_1 = true; $__currentLoopData = $messagesSender; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $messageSender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td width="10%" nowrap><?php echo e($messageSender->usuarioReceiver->name); ?></td>
                                <td><?php echo e($messageSender->message); ?></td>
                                <td width="8%" nowrap> <?php echo (new DateTime($messageSender->datetime))->format('d/m/Y H:i'); ?></td>
                                <td width="5%" nowrap><?php echo e($messageSender->statusMessage($messageSender->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="90">
                                    <p>Nenhum Resultado</p>
                                </td>
                            </tr>
                        <?php endif; ?> 
                    </table>
                    <?php echo e($messagesSender->appends(request()->except('_token'))->links()); ?> 
                    <?php echo $__env->make('painel.cadastros.messages.modals.store.modal_store', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>