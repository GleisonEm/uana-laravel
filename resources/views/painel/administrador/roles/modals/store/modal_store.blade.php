<div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Cadastro de Perfil</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => 'roles.store', 'class' => 'form form-prevent-multiple-submits']) }}
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-5">
                            <div class="form-group">
                                {{ Form::label('name', 'Nome *') }}
                                {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '50')) }}
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group">
                                {{ Form::label('description', 'Descrição *') }}
                                {{ Form::text('description', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100')) }}
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            {{ Form::label('permissions[]', 'Permissões *') }}
                            {{ Form::select('permissions[]', $permissionsForSelect, old('permissions[]'), ['class' => "form-control select2-multi", 'multiple' => 'multiple', 'style' => 'width:100%;', 'required' => '']) }}
                        </div>    
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
