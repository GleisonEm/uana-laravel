<div class="modal fade" id="destroy{{$institute->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Exclusão de Instituição</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => ['institutes.destroy', $institute->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'DELETE']) }}
                    <p><b>Nome: <span style="color:blue"> {{$institute->name}}</span></b></p>
                    <p><b>Criado por:</b> {{$institute->created_by}} <b>em</b> @dataHora($institute->created_at)</p>
                    <p><b>Alterado por:</b> {{$institute->updated_by}} <b>em</b> @dataHora($institute->updated_at)</p>
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