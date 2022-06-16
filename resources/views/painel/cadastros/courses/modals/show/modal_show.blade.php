<div class="modal fade" id="show{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Dados do Curso</b></h4>
            </div>
            <div class="modal-body">
                <p><b>Instituição:</b> {{$course->institute->name}}</p>
                <p><b>Curso: <span style="color:blue"> {{$course->name}}</span></b></p>
                <p><b>Criado por:</b> {{$course->created_by}} <b>em</b> @dataHora($course->created_at)</p>
                <p><b>Alterado por:</b> {{$course->updated_by}} <b>em</b> @dataHora($course->updated_at)</p>
                <hr>
                <div class=text-right>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                </div> 
            </div>
        </div>
    </div>
</div>
