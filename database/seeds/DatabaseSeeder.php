<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
    	$this->call(AssignmentsTableSeeder::class);
    	$this->call(InstitutesTableSeeder::class);
    	$this->call(CoursesTableSeeder::class);
        $this->call(AreasTableSeeder::class);
    	$this->call(UsersTableSeeder::class);
    	$this->call(RolesTableSeeder::class);
    	$this->call(PermissionsTableSeeder::class);
    	$this->call(UsersRolesPermissionsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
    }


}
