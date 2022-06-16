<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Administrador',
                'description' => 'Administrador do sistema',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        //1
            ],
            [
                'name' => 'Cadastros',
                'description' => 'Módulo de cadastros do sistema',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        //2                
            ],
            [
                'name' => 'Professor',
                'description' => 'Módulo do Professor',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        //3                
            ],
            [
                'name' => 'Aluno',
                'description' => 'Módulo do Aluno',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        //4                
            ],
 
        ]);
    }
}
