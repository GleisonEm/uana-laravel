<div class="modal fade" id="deferir1{{$protocol_document->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center"><b>Confirma o Indeferimento ?</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::model($protocol, ['route' => ['documentos.deferir', $protocol_document->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT']) }}
                    {{ Form::hidden('url_anterior', $url_anterior, array('class' => 'form-control', 'required' => '')) }}
                    {{ Form::hidden('protocol_id', $protocol->id, array('class' => 'form-control', 'required' => '')) }}
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Documento</th>
                        </tr>
                        <tr>
                            <td>{{ str_limit($protocol_document->document->name, 80) }}</td>
                        </tr>
                    </table>        
                    <hr>
                    <div class="form-group">
                        {{ Form::label('observacao_deferimento', 'Observação *') }}
                        {{ Form::textarea('observacao_deferimento', null, array('class' => 'form-control', 'style' => 'resize:none', 'rows' => '5', 'required' => '')) }}
                    </div>                   
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class=text-right>
                                {{ Form::submit('Confirmar Indeferimento', ['class' => 'btn btn-success button-prevent-multiple-submits']) }}
                                {{ Form::submit('Sair', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}
                            </div>
                        </div>
                    </div>  
                {{ Form::close() }}  
            </div>
        </div>
    </div>
</div>

