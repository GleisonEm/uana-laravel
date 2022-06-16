<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('areas')->insert([
            [
                'name' => 'Ciências Exatas e da Terra',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ], 
            [
                'name' => 'Ciências Biológicas',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ], 
            [
                'name' => 'Engenharias',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ], 
            [
                'name' => 'Ciências da Saúde',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ], 
            [
                'name' => 'Ciências Agrárias',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ], 
            [
                'name' => 'Ciências Sociais Aplicadas',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ], 
            [
                'name' => 'Ciências Humanas',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ], 
            [
                'name' => 'Lingüística, Letras e Artes',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'created_by' => 'admin',
                'updated_by' => 'admin',                    
            ], 
                                    
        ]);
    }
}
