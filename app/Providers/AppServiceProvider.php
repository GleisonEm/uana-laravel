<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Blade;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\Assignment;
use App\Models\Document;

class AppServiceProvider extends ServiceProvider
{

    public function boot() {
        //resolve o problema do tamanho (191) dos campos strings "utf8mb4_unicode_ci"
        Schema::defaultStringLength(191);   
        
        //Converte data/hora para padrão brasileiro
        Blade::directive('dataHora', function($date) {
        	return "<?php echo (new DateTime($date))->format('d/m/Y H:i'); ?>";
        });
        //Retorna só o ano de uma data
        Blade::directive('anoData', function($date) {
            return "<?php echo (new DateTime($date))->format('Y'); ?>";
        });
        //Retorna só a data
        Blade::directive('soData', function($date) {
            return "<?php echo (new DateTime($date))->format('d/m/Y'); ?>";
        });


## PEGAR EXCLUSÃO DE REGISTROS ###############################################################
        Permission::deleted(function ($permission) {
            sendLog('permissions', 'E', $permission->toJson());
        });

        Role::deleted(function ($role) {
            sendLog('roles', 'E', $role->toJson());
        });

        User::deleted(function ($user) {
            sendLog('users', 'E', $user->toJson());
        });

        Assignment::deleted(function ($assignment) {
            sendLog('assignments', 'E', $assignment->toJson());
        });


##############################################################################################
    }

    public function register() {
        //
    }
}
