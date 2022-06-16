<div class="modal fade" id="show{{$institute->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Dados da Instituição</b></h4>
            </div>
            <div class="modal-body">
                <p><b>Nome: <span style="color:blue"> {{$institute->name}}</span></b></p>
                <p><b>Criado por:</b> {{$institute->created_by}} <b>em</b> @dataHora($institute->created_at)</p>
                <p><b>Alterado por:</b> {{$institute->updated_by}} <b>em</b> @dataHora($institute->updated_at)</p>
                <hr>
                <div class=text-right>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                </div> 
            </div>
        </div>
    </div>
</div>
