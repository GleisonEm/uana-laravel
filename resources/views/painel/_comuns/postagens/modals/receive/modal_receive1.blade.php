<div class="modal fade" id="receive1{{$protocol->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center"><b>Desfazer Confirmação da Documentação ?</b></h4>
            </div>
            <div class="modal-body">
                {{ Form::model($protocol, ['route' => ['documentos.receive', $protocol->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT']) }}
                    {{ Form::hidden('desfazer', 'desfazer', array('class' => 'form-control', 'required' => '')) }}
                    {{ Form::hidden('url_anterior', $url_anterior, array('class' => 'form-control', 'required' => '')) }}
                    {{ Form::hidden('protocol_id', $protocol->id, array('class' => 'form-control', 'required' => '')) }}
                    <div class="form-group">
                        {{ Form::label('observacao_confirmacao', 'Observação') }}
                        {{ Form::textarea('observacao_confirmacao', null, array('class' => 'form-control', 'style' => 'resize:none', 'rows' => '5', 'required' => '', 'disabled' => 'disabled')) }}
                    </div>  

                    @if ($protocol->data_confirmacao != null)
                        <p><b>Confirmado por:</b> {{$protocol->usuarioConfirmacao->name}} <b>em</b> @dataHora($protocol->data_confirmacao)</p>
                    @endif

                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class=text-right>
                                {{ Form::submit('SIM', ['class' => 'btn btn-success button-prevent-multiple-submits']) }}
                                {{ Form::submit('NÃO', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}
                            </div>
                        </div>
                    </div>  
                {{ Form::close() }}  
            </div>
        </div>
    </div>
</div>