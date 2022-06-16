<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('courses')->insert([
            [
                'name' => 'Doutorado em Agroecologia e Desenvolvimento Territorial',
                'institute_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),    
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ],
        ]);
    }
}
