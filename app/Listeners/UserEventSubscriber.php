<?php

namespace App\Listeners;
 
class UserEventSubscriber
{

    public function onUserLogin($event)
    {
        // Registra o acesso do usuário logado
        auth()->user()->registerLogin();
    }
 
    public function onUserLogout($event)
    {
        // Registra o acesso do usuário logado
        auth()->user()->registerLogout();
    }

    public function onlogOperacao($event)
    {
        auth()->user()->logOperacao();
    }


    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );
 
        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );

        $events->listen(
            'Illuminate\Auth\Events\Operacao',
            'App\Listeners\UserEventSubscriber@onlogOperacao'
        );

    }
 
}