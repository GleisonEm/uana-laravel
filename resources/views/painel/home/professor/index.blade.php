@extends('adminlte::page')

@section('content')

      
            <div class="col-lg-4 col-xs-4">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <p>Total de Turmas</p>
                        <h3>{{$total_turmas}}</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-plus-circled"></i>
                    </div>
                    <a href="{{route('teams.index')}}" class="small-box-footer"><h4><b><span class="fa fa-hand-o-right"></span> Gerenciar Turmas </b></h4></a>
                </div>
            </div>
        
        
        

@endsection