<div class="modal fade" id="update{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Alteração de Permissão</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::model($permission, ['route' => ['permissions.update', $permission->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT']) }}
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
                        {{ Form::submit('Alterar', ['class' => 'btn btn-primary button-prevent-multiple-submits']) }}
                        {{ Form::submit('Sair', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                    </div>
                {{ Form::close() }}           
            </div>
        </div>
    </div>
</div>

