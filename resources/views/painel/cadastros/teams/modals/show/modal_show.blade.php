<div class="modal fade" id="show{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Dados da Turma</b></h4>
            </div>
            <div class="modal-body">
                <p><b>Turma: <span style="color:blue"> {{$team->name}}</span></b></p>
                <p><b>Criado por:</b> {{$team->created_by}} <b>em</b> @dataHora($team->created_at)</p>
                <p><b>Alterado por:</b> {{$team->updated_by}} <b>em</b> @dataHora($team->updated_at)</p>
                <hr>
                <div class=text-right>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                </div> 
            </div>
        </div>
    </div>
</div>
