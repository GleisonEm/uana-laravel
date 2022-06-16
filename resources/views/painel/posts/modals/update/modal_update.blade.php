<div class="modal fade" id="update{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Alteração de Publicação</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::model($post, ['route' => ['posts.update', $post->id], 'class' => 'form form-prevent-multiple-submits', 'enctype' => 'multipart/form-data', 'method' => 'PUT']) }}
                    {{ Form::hidden('team_id', $team_id, array('class' => 'form-control')) }}
                    <div class="form-group">
                        {{ Form::label('titulo', 'Título *') }}
                        {{ Form::text('titulo', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '60')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('subtitulo', 'Subtítulo *') }}
                        {{ Form::text('subtitulo', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '60')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('conteudo', 'Conteúdo') }}
                        {{ Form::textarea('conteudo', null, array('class' => 'form-control', 'style' => 'resize:none', 'rows' => '5', 'maxlength' => '280')) }}
                    </div> 
                    <div class="form-group">
                        {{ Form::label('tags', 'Tags associadas') }}
                        <br>
                        {{ Form::text('tags', null, array('class' => 'form-control', 'data-role' => 'tagsinput')) }}
                    </div>
                    <div class="form-group">
                        <label>Imagem *</label>
                        <input type="file" name="imagem" class="form-control" required="required">
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

