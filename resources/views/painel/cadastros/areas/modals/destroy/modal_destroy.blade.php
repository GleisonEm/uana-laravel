<div class="modal fade" id="destroy{{$area->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Exclusão de Área de Conhecimento</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => ['areas.destroy', $area->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'DELETE']) }}
                    <p><b>Nome: <span style="color:blue"> {{$area->name}}</span></b></p>
                    <p><b>Criado por:</b> {{$area->created_by}} <b>em</b> @dataHora($area->created_at)</p>
                    <p><b>Alterado por:</b> {{$area->updated_by}} <b>em</b> @dataHora($area->updated_at)</p>
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