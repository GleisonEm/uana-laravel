@extends('adminlte::page')

@section('content')


    <table class="table table-bordered table-striped">
            @forelse($team_users as $team_user)
                <tr>
                    <div class="col-lg-4 col-xs-4">
                        <div class="small-box bg-olive">
                            <div class="inner">
                                <p>Turma ({{ $team_user->team->key }})</p>
                                <p>Professor(a): {{ $team_user->retorna_usuario($team_user->team->user_id) }}</p>
                                <h4>{{ $team_user->team->name }}</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-files-o"></i>
                            </div>
                            <a href="{{route('posts.index', $team_user->team_id)}}" class="small-box-footer"><h4><b><span class="fa fa-hand-o-right"></span> Compartilhamentos </b></h4></a>
                        </div>
                    </div>  
                </tr>
            @empty
                <tr>
                    <td colspan="90">
                        <p>Você não tem turmas !</p>
                    </td>
                </tr>
            @endforelse 
        </table>

      

@endsection
