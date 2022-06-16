<div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Cadastro de Função</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => 'assignments.store', 'class' => 'form form-prevent-multiple-submits']) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Nome *') }}
                        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '60')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('key', 'Chave *') }}
                        {{ Form::text('key', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '7')) }}
                    </div>
                    <hr>
                    <div class=text-right>
                        {{ Form::submit('Cadastrar', ['class' => 'btn btn-primary button-prevent-multiple-submits']) }}
                        {{ Form::submit('Sair', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                    </div>           
                {{ Form::close() }}   
            </div>
        </div>
    </div>
</div>
