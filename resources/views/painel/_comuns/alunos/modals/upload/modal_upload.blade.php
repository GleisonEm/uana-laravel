<div style="color: black" class="modal fade" id="upload{{$protocol_document->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center"><b>Anexar Documento</b></h4>
            </div>
            <br>
            
            <div class="col-md-12 col-sm-12 col-xs-12">    
                <table class="table table-bordered table-striped table-responsive">
                    <tr>
                        <th>Documento</th>
                    </tr>
                    <tr>
                        <td>{{ str_limit($protocol_document->document->name, 80) }}</td>   
                    </tr>            
                </table>     
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">  
                <p>Tamanho máximo do arquivo: <b>5 Mbytes</b> </p>
            </div>

            <div class="modal-body">
                {{ Form::model($protocol, ['route' => ['documentos.upload', $protocol_document->id], 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                    {{ Form::hidden('url_anterior', $url_anterior, array('class' => 'form-control', 'required' => '')) }}
                    {{ Form::hidden('protocol_id', $protocol->id, array('class' => 'form-control', 'required' => '')) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {{ Form::input('file', 'certificate', 'null', array('class' => 'form-control', 'required' => '')) }}
                    </div>                 
                    <hr>
                    <div class=text-right>
                        {{ Form::submit('Enviar', ['class' => 'btn btn-success button-prevent-multiple-submits']) }}
                        {{ Form::submit('Sair', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}  
                    </div>            
                {{ Form::close() }}    
            </div>
        </div>
    </div>
</div>


@section('pos-script')

<script type="text/javascript">


</script>
@endsection