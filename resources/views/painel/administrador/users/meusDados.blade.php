@extends('adminlte::page')

@section('content')
    @php
      $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
      if(isset($_POST['texto']) || isset($_GET['texto']) ) {    
        $_POST['texto'] = isset($_POST['texto']) ? $_POST['texto'] : $_GET['texto'];
        $_GET['texto'] =  $_POST['texto'];
      }
    @endphp
    <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
        {{ Form::model($user, ['route' => 'users.dadosUpdate', 'class' => 'form form-prevent-multiple-submits', 'method' => 'PUT']) }}
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        {{ Form::label('cpf', 'CPF *') }}
                        {{ Form::text('cpf', auth()->user()->cpf, array('class' => 'form-control mascara-cpfcnpj', 'required' => '')) }}
                    </div>                       
                    <div class="form-group">
                        {{ Form::label('name', 'Nome *') }}
                        {{ Form::text('name', auth()->user()->name, array('class' => 'form-control', 'required' => '', 'maxlength' => '50')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', 'Email *') }}
                        {{ Form::email('email', auth()->user()->email, array('class' => 'form-control', 'required' => '', 'maxlength' => '50')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('tags', 'Áreas de interesse') }}
                        <br>
                        {{ Form::text('tags', auth()->user()->tags, array('class' => 'form-control', 'data-role' => 'tagsinput')) }}
                    </div>

                </div>   
            </div>
            <hr>
            <div class=text-right>
                {{ Form::submit('Alterar', ['class' => 'btn btn-primary button-prevent-multiple-submits']) }}
                <a href="{{route('home')}}" data-toggle="modal" class="btn btn-default"> 
                    <span class="fa fa-sign-out"></span> Sair
                </a>  
            </div> 
        {{ Form::close() }}        
    </div> 

    <div>
        <table class="table table-bordered table-striped">
        <tr>
            <th>Função</th>
        </tr>
        @forelse($array_tag as $post)
            <tr>
            <!--    @forelse($array_tag as $teste)
                    @if(stripos($teste, 'marcio') !== FALSE)  -->

                        <td>{{ $post->tags }}</td>
                <!--    @endif
                @empty
                
                @endforelse  -->
                
                 
            </tr>
        @empty
            <tr>
                <td colspan="90">
                    <p>Nenhum Resultado</p>
                </td>
            </tr>
        @endforelse 
        </table>
    </div>


@endsection



    
