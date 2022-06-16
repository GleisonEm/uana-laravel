<div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Cadastro de Permissão</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => 'permissions.store', 'class' => 'form form-prevent-multiple-submits']) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Nome *') }}
                        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '50')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Descrição *') }}
                        {{ Form::text('description', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100')) }}
                    </div>
                    <hr>
                    <div class=text-right>
                        {{ Form::submit('Cadastrar', ['class' => 'btn btn-primary button-prevent-multiple-submits']) }}
                        {{ Form::submit('Sair', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                    </div>           
                {{ Form::close() }} 
            </div>
        </div>
    </div>
</div>
