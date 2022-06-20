<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Team_User;
use Auth;

class AdminController extends Controller
{

    public function index()
    {
        if (!Auth::user()) {
            return view('auth.login');
        }
        ##//ADMINISTRADOR
        if (Auth::user()->assignment_id == 1) {
            $title = 'Administrador do Sistema';
            return view('painel.home.administrador.index', compact('title'));
        }

        //COORDENADOR
        if (Auth::user()->assignment_id == 2) {
            $title = 'Coordenador';
            return view('painel.home.coordenador.index', compact('title'));
        }

        //PROFESSOR
        if (Auth::user()->assignment_id == 3) {
            $title = 'Professor';

            $total_turmas = Team::orderBy('id', 'desc')
                ->where('user_id', Auth::user()->id)
                ->count();

            return view('painel.home.professor.index', compact('title', 'total_turmas'));
        }

        //ALUNO
        if (Auth::user()->assignment_id == 4) {
            $title = 'Minhas turmas';

            $team_users = Team_User::orderBy('team_id', 'asc')
                ->where('user_id', Auth::user()->id)
                ->get();

            $total_turmas = Team_User::orderBy('team_id', 'desc')
                ->where('user_id', Auth::user()->id)
                ->count();

            return view('painel.home.aluno.index', compact('title', 'team_users', 'total_turmas'));
        }
    }
}