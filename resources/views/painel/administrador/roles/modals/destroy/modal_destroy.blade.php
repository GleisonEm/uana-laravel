<div class="modal fade" id="destroy{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Exclusão de Perfil</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => ['roles.destroy', $role->id], 'class' => 'form form-prevent-multiple-submits',  'method' => 'DELETE']) }}
                    <p><b>Nome: <span style="color:blue"> {{$role->name}}</span></b></p>
                    <p><b>Descrição:</b> {{$role->description}}</p>
                    <p><b>Criado por:</b> {{$role->created_by}} <b>em</b> @dataHora($role->created_at)</p>
                    <p><b>Alterado por:</b> {{$role->updated_by}} <b>em</b> @dataHora($role->updated_at)</p>
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
