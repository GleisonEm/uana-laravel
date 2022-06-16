@extends('adminlte::page')

@section('content')
    @php
      $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
      if(isset($_POST['texto']) || isset($_GET['texto']) ) {    
        $_POST['texto'] = isset($_POST['texto']) ? $_POST['texto'] : $_GET['texto'];
        $_GET['texto'] =  $_POST['texto'];
      }
    @endphp
        <a href="{{route('home')}}" data-toggle="modal" class="btn {{ config('adminlte.botaoImprimir') }}"> 
            <span class="fa fa-sign-out"></span> Sair
        </a>
        <hr>                        
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab"><h4><b style="color:#0077b3"><i class="fa fa-cloud-download"></i> Mensagens Recebidas</b></h4></a></li>
                <li><a href="#tab_2" data-toggle="tab"><h4><b style="color:#bf4040"><i class="fa  fa-cloud-upload"></i> Enviar Mensagens</b></h4></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="x_title">
                        <form class="navbar-form navbar-right" role="search" action="{{route('messages.search')}}" method="post">
                            <div class="form-group">
                                {{ csrf_field() }}
                                <input type="text" name="texto" class="form-control" placeholder="Pesquisar">
                                {{ Form::hidden('page', $_GET['page'], array('class' => 'form-control', 'required' => '')) }}
                                {{ Form::hidden('pesquisa', 'Sim', array('class' => 'form-control', 'required' => '')) }}
                            </div>    
                            <button type="submit" class="btn {{ config('adminlte.botaoPesquisar') }}"><span class="fa fa-search-plus"></span> Pesquisar</button>
                        </form> 
                    </div>  
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>De</th>
                            <th>Mensagem</th>
                            <th>Data</th>
                            <th>Situação</th>
                            <th>Ações</th>
                        </tr>
                        @forelse($messagesReceiver as $messageReceiver)
                            @if($messageReceiver->status == 'A')
                                @php $color = '#0077b3' @endphp
                            @else
                                @php $color = '#b3b3b3' @endphp
                            @endif
                            <tr style='color:{{$color}}'>
                                <td width="10%" nowrap>{{ $messageReceiver->usuarioSender->name }}</td>
                                <td>{{ $messageReceiver->message }}</td>
                                <td width="8%" nowrap> @dataHora($messageReceiver->datetime)</td>
                                <td width="5%" nowrap>{{ $messageReceiver->statusMessage($messageReceiver->status) }}</td>
                                <td style='color:black' width="1%" nowrap>
                                {{--    @can('cadastros_mensagens_ler')     --}}   
                                        @if($messageReceiver->status == 'A')
                                            <a href="#ler{{$messageReceiver->id}}" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoAlterar') }}">
                                                <span class="fa fa-trash"></span> Marcar como lida
                                            </a> 
                                        @endif
                                {{--    @endcan     --}}
                                {{--    @can('cadastros_mensagens_responder')    --}}    
                                        <a href="#responder{{$messageReceiver->id}}" data-toggle="modal" class="btn btn-xs {{ config('adminlte.botaoAlterar') }}">
                                            <span class="fa fa-edit"></span> Responder
                                        </a> 
                                {{--    @endcan     --}}
                                    @include ('painel.cadastros.messages.modals.responder.modal_responder')
                                    @include ('painel.cadastros.messages.modals.ler.modal_ler')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="90">
                                    <p>Nenhum Resultado</p>
                                </td>
                            </tr>
                        @endforelse 
                    </table>
                    {{ $messagesReceiver->appends(request()->except('_token'))->links() }} 
                </div>
                
                <div class="tab-pane" id="tab_2">
                    <div class="x_title">
                    {{--     @can('cadastros_mensagens_cadastrar')      --}}  
                            <a href="#store" data-toggle="modal" class="btn {{ config('adminlte.botaoCadastrar') }}"> 
                                <span class="fa fa-plus"></span> Nova Mensagem
                            </a>
                    {{--    @endcan  --}}
                        <form class="navbar-form navbar-right" role="search" action="{{route('messages.search')}}" method="post">
                            <div class="form-group">
                                {{ csrf_field() }}
                                <input type="text" name="texto" class="form-control" placeholder="Pesquisar">
                                {{ Form::hidden('page', $_GET['page'], array('class' => 'form-control', 'required' => '')) }}
                                {{ Form::hidden('pesquisa', 'Sim', array('class' => 'form-control', 'required' => '')) }}
                            </div>    
                            <button type="submit" class="btn {{ config('adminlte.botaoPesquisar') }}"><span class="fa fa-search-plus"></span> Pesquisar</button>
                        </form> 
                    </div>  
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Para</th>
                            <th>Mensagem</th>
                            <th>Data</th>
                            <th>Situação</th>                            
                        </tr>
                        @forelse($messagesSender as $messageSender)
                            <tr>
                                <td width="10%" nowrap>{{ $messageSender->usuarioReceiver->name }}</td>
                                <td>{{ $messageSender->message }}</td>
                                <td width="8%" nowrap> @dataHora($messageSender->datetime)</td>
                                <td width="5%" nowrap>{{ $messageSender->statusMessage($messageSender->status) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="90">
                                    <p>Nenhum Resultado</p>
                                </td>
                            </tr>
                        @endforelse 
                    </table>
                    {{ $messagesSender->appends(request()->except('_token'))->links() }} 
                    @include ('painel.cadastros.messages.modals.store.modal_store')
                </div>
            </div>


@endsection