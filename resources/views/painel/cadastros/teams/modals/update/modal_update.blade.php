<div class="modal fade" id="update{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Alteração de Turma</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::model($team, ['route' => ['teams.update', $team->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT']) }}
                    <div class="form-group">
                        {{ Form::label('course_id', 'Curso *', array('class' => 'control-label')) }}
                        <br>
                        {{ Form::select('course_id', $coursesForSelect, null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'required' => '', 'placeholder' => '']) }}
                    </div>  
                    <div class="form-group">
                        {{ Form::label('name', 'Turma *') }}
                        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '60')) }}
                    </div>
                    <hr>
                    <div class=text-right>
                        {{ Form::submit('Alterar', ['class' => 'btn btn-primary button-prevent-multiple-submits']) }}
                        {{ Form::submit('Sair', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                    </div>
                {{ Form::close() }}                 
            </div>
        </div>
    </div>
</div>

