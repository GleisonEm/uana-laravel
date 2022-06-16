<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role_User;
use Auth;

class Cadastros
{
	//Tabela roles:
	//Cadastros do Sistema - 2

    public function handle($request, Closure $next)
    {
        $role = Role_User::orderBy('role_id', 'asc')
        ->where('user_id','=', Auth::user()->id)
        ->where('role_id','=', '2')
        ->first();
        if ($role == null)
        {
            return redirect()->back();
        }
        return $next($request);
    }
}
