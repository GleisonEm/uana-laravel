<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\User;
use App\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
      //  'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

       
        try {
            $permissions = Permission::with('roles')->get();
            foreach( $permissions as $permission )
            {
                $gate->define($permission->name, function(User $user) use ($permission){
                    return $user->hasPermission($permission);
            });
            }
        } catch (\Exception $e) {
            return [];
        }

        $gate->before(function(User $user, $ability){
            
            if ( $user->hasAnyRoles('adm') )
                return true;
            
        });
    }
}
