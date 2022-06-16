<div class="modal fade" id="destroy{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Exclusão de Curso</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => ['courses.destroy', $course->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'DELETE']) }}
                    <p><b>Instituição:</b> {{$course->institute->name}}</p>
                    <p><b>Curso: <span style="color:blue"> {{$course->name}}</span></b></p>
                    <p><b>Criado por:</b> {{$course->created_by}} <b>em</b> @dataHora($course->created_at)</p>
                    <p><b>Alterado por:</b> {{$course->updated_by}} <b>em</b> @dataHora($course->updated_at)</p>
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