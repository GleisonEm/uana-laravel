<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            //ADMINISTRADOR
            [
                'cpf' => '037.158.474-41',
                'name' => 'Márcio Diniz',
                'email' => 'marcio0401@gmail.com',                  //1
                'password' => bcrypt('541980'),
                'assignment_id' => '1',
                'institute_id' => '1',
                'area_id' => '1',
                'block' => 'N',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ],
            //PROFESSOR
            [
                'cpf' => '000.000.000-01',
                'name' => 'Adalberto Gomes Diniz',
                'email' => 'professor1@gmail.com',                  //2
                'password' => bcrypt('123456'),
                'assignment_id' => '3',
                'institute_id' => '1',
                'area_id' => '2',
                'block' => 'N',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ],
            [
                'cpf' => '000.000.000-02',
                'name' => 'Ana Maria Rodrigues Diniz',
                'email' => 'professor2@gmail.com',                  //3
                'password' => bcrypt('123456'),
                'assignment_id' => '3',
                'institute_id' => '1',
                'area_id' => '2',
                'block' => 'N',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ],

            //ALUNO
            [
                'cpf' => '000.000.000-03',
                'name' => 'Luciana Rodrigues Diniz',
                'email' => 'aluno1@gmail.com',                  //4
                'password' => bcrypt('123456'),
                'assignment_id' => '4',
                'institute_id' => '1',
                'area_id' => '3',
                'block' => 'N',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ],
            [
                'cpf' => '000.000.000-04',
                'name' => 'Marcelo Rodrigues Diniz',
                'email' => 'aluno2@gmail.com',                  //5
                'password' => bcrypt('123456'),
                'assignment_id' => '4',
                'institute_id' => '1',
                'area_id' => '1',
                'block' => 'N',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ],

        ]);
    }
}


