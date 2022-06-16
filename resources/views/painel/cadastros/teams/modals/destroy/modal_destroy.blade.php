<div class="modal fade" id="destroy{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Exclusão de Turma</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => ['teams.destroy', $team->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'DELETE']) }}
                    <p><b>Turma: <span style="color:blue"> {{$team->name}}</span></b></p>
                    <p><b>Criado por:</b> {{$team->created_by}} <b>em</b> @dataHora($team->created_at)</p>
                    <p><b>Alterado por:</b> {{$team->updated_by}} <b>em</b> @dataHora($team->updated_at)</p>
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