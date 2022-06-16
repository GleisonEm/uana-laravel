<div class="modal fade" id="show{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Dados do Perfil</b></h4>
            </div>
            <div class="modal-body">
                <p><b>Nome: <span style="color:blue"> {{$role->name}}</span></b></p>
                <p><b>Descrição:</b> {{$role->description}}</p>
                <p><b>Criado por:</b> {{$role->created_by}} <b>em</b> @dataHora($role->created_at)</p>
                <p><b>Alterado por:</b> {{$role->updated_by}} <b>em</b> @dataHora($role->updated_at)</p>
                <hr>
                <div class=text-right>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                </div> 
            </div>
        </div>
    </div>
</div>
