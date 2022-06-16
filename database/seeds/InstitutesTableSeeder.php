<?php

use Illuminate\Database\Seeder;

class InstitutesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('institutes')->insert([
            [
                'name' => 'Universidade Federal do Vale do São Francisco',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',        //1                
            ], 

        ]);
    }
}
