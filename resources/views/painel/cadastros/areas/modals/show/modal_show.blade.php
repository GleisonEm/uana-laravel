<div class="modal fade" id="show{{$area->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Dados da Área de Conhecimento</b></h4>
            </div>
            <div class="modal-body">
                <p><b>Nome: <span style="color:blue"> {{$area->name}}</span></b></p>
                <p><b>Criado por:</b> {{$area->created_by}} <b>em</b> @dataHora($area->created_at)</p>
                <p><b>Alterado por:</b> {{$area->updated_by}} <b>em</b> @dataHora($area->updated_at)</p>
                <hr>
                <div class=text-right>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                </div> 
            </div>
        </div>
    </div>
</div>
