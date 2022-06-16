<?php

use Illuminate\Database\Seeder;

class AssignmentsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('assignments')->insert([
            [
                'name' => 'Administrador do Sistema',
                'key' => 'ADM0001',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        //1                
            ], 
            [
                'name' => 'Coordenador',
                'key' => 'CRD0001',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        //2                
            ],
            [
                'name' => 'Professor',
                'key' => 'PRO0001',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        //3                
            ],
            [
                'name' => 'Aluno',
                'key' => 'ALU0001',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        //4                
            ],

        ]);
    }
}
