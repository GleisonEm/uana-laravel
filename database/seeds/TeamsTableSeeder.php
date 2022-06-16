<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('teams')->insert([
            [
                'name' => 'Educação em Agroecologia',
                'institute_id' => '1',
                'course_id' => '1',
                'user_id' => '2',
                'key' => 'ED9584E',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ],
            [
                'name' => 'Desenvolvimento Territorial',
                'institute_id' => '1',
                'course_id' => '1',
                'user_id' => '2',
                'key' => '3DD5D24',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ],
            [
                'name' => 'Manejo do solo',
                'institute_id' => '1',
                'course_id' => '1',
                'user_id' => '3',
                'key' => 'B13209A',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ],     
                   
        ]);
    }
}
