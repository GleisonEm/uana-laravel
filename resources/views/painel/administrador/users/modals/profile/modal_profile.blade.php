<div  class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Perfil do Usuário</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <img src="{{url('assets/uploads/avatars', Auth::user()->avatar)}}" style="width: 150px; float: left; border-radius: 50%; margin-right: 25px;">
                        <h2>Perfil de {{ Auth::user()->name}}</h2>
                        {{ Form::model(Auth::user(), ['route' => ['users.profile', Auth::user()->id], 'enctype' => 'multipart/form-data', 'method' => 'POST']) }}
                            <div class="row">
                                <label>Atualizar imagem do perfil</label>
                                <input type="file" name="avatar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                            <hr>
                            <div class=text-right>
                                {{ Form::submit("Enviar", ['class' => 'btn btn-primary']) }}
                                {{ Form::submit("Sair", ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                            </div> 
                        {{ Form::close() }}       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
