<div class="modal fade" id="destroy{{$assignment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Exclusão de Função</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => ['assignments.destroy', $assignment->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'DELETE']) }}
                    <p><b>Nome: <span style="color:blue"> {{$assignment->name}}</span></b></p>
                    <p><b>Chave:</b> {{$assignment->key}}</p>
                    <p><b>Criado por:</b> {{$assignment->created_by}} <b>em</b> @dataHora($assignment->created_at)</p>
                    <p><b>Alterado por:</b> {{$assignment->updated_by}} <b>em</b> @dataHora($assignment->updated_at)</p>
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