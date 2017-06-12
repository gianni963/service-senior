<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role;
        $role_admin->name = 'admin';
        $role_admin->save();
        
        $role_senior = new Role;
        $role_senior->name = 'senior';
        $role_senior->save();
        
        $role_prestataire = new Role;
        $role_prestataire->name = 'prestataire';
        $role_prestataire->save();
    }

}
