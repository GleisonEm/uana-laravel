<div class="modal fade" id="show{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Dados da Permissão</b></h4>
            </div>
            <div class="modal-body">
                <p><b>Permissão: <span style="color:blue"> {{$permission->name}}</span></b></p>
                <p><b>Descrição:</b> {{$permission->description}}</p>
                <p><b>Criado por:</b> {{$permission->created_by}} <b>em</b> @dataHora($permission->created_at)</p>
                <p><b>Alterado por:</b> {{$permission->updated_by}} <b>em</b> @dataHora($permission->updated_at)</p>
                <hr>
                <div class=text-right>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                </div> 
            </div>
        </div>
    </div>
</div>
