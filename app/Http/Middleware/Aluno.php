<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role_User;
use Auth;

class Aluno
{
	//Tabela roles:
	//Aluno - 4

    public function handle($request, Closure $next)
    {
        $role = Role_User::orderBy('role_id', 'asc')
        ->where('user_id','=', Auth::user()->id)
        ->where('role_id','=', '4')
        ->first();
        if ($role == null)
        {
            return redirect()->back();
        }
        return $next($request);
    }
}
