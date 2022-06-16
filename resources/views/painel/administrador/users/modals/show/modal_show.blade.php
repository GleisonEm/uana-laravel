<div class="modal fade" id="show{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Dados do Usuário</b></h4>
            </div>
            <div class="modal-body">
                <p><b>CPF:</b> {{$user->cpf}}</p>
                <p><b>Nome: <span style="color:blue"> {{$user->name}}</span></b></p>
                <p><b>E-mail:</b> {{$user->email}}</p>
                <p><b>Criado por:</b> {{$user->created_by}} <b>em</b> @dataHora($user->created_at)</p>
                <p><b>Alterado por:</b> {{$user->updated_by}} <b>em</b> @dataHora($user->updated_at)</p>
                <hr>
                <div class=text-right>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                </div> 
            </div>
        </div>
    </div>
</div>
