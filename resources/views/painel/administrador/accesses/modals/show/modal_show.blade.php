<div class="modal fade" id="show{{$access->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Dados do Acesso</b></h4>
            </div>
            <div class="modal-body">
                <p><b>Data/Hora:</b> @dataHora($access->datetime) </p>
                <p><b>Usuário:</b> {{ $access->name }} </p>
                <p><b>IP:</b> {{ $access->ip }} </p>
                <p><b>Ação:</b> {{ $access->typeAccess($access->action) }} </p>
                <p><b>Criado por:</b> {{$access->created_by}} <b>em</b> @dataHora($access->created_at)</p>
                <p><b>Alterado por:</b> {{$access->updated_by}} <b>em</b> @dataHora($access->updated_at)</p>
                <hr>
                <div class=text-right>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                </div> 
            </div>
        </div>
    </div>
</div>
