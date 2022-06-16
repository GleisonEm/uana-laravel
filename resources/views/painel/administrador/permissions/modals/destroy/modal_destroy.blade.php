<div class="modal fade" id="destroy{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Exclusão de Permissão</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => ['permissions.destroy', $permission->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'DELETE']) }}
                    <p><b>Nome: <span style="color:blue"> {{$permission->name}}</span></b></p>
                    <p><b>Descrição:</b> {{$permission->description}}</p>
                    <p><b>Criado por:</b> {{$permission->created_by}} <b>em</b> @dataHora($permission->created_at)</p>
                    <p><b>Alterado por:</b> {{$permission->updated_by}} <b>em</b> @dataHora($permission->updated_at)</p>
                    <hr>
                    <div class=text-right>
                        {{ Form::submit("Excluir", ['class' => 'btn btn-primary button-prevent-multiple-submits']) }}
                        {{ Form::submit("Sair", ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                    </div> 
                {{ Form::close() }} 
            </div>
        </div>
    </div>
</div>
