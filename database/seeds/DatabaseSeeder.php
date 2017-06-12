<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {   
        
        $this->call(CategoryTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ZoneTableSeeder::class);
        $this->call(TagTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        
        
    }
}
