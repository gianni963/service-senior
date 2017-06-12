<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	 	// DB::table('users')->delete();

   //      $role_admin = Role::Where('name','admin')->first();
   //      $role_senior = Role::Where('name','senior')->first();
   //      $role_prestataire = Role::Where('name','prestataire')->first();
         
   //       DB::table('users')->insert(array(
   //           array('name'=>'gianni','email'=>'gianni@example.com','password'=>'gianni10','description'=>'administrateur du site', ),
   //         	array('name'=>'eric','email'=>'eric@example.com','password'=>'gianni10','description'=>"je m'occupe du jardin, haie et tonte de pelouse" ),
   //         	array('name'=>'marie','email'=>'eric@example.com','password'=>'mariei10','description'=>"je m'occupe du jardin, haie et tonte de pelouse" ),
             

          ));
  //       $user1 = new User;
  //       $user1->name = 'gianni';
  //       $user1->email = 'gianni@example.com';
  //       $user2->password = bcrypt('gianni10');
		// $user1->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin varius odio et sem elementum molestie. Etiam scelerisque rutrum lorem, vitae pharetra diam feugiat a. Sed auctor dui egestas orci dictum, at aliquet ligula porttitor. Cras nec augue luctus, fringilla lacus eu, iaculis ipsum. Mauris pretium fringilla feugiat.';
		// $user1->roles()->attach($role_admin);
  //       $user1->save();
        

  //       $user2 = new User;
  //       $user2->name = 'marie';
  //       $user2->email = 'marie@example.com';
  //       $user2->password = bcrypt('marie10');
  //       $user2->description = 'Bonjour, je m\'appelle Marie, j\'aurais besoin d\'une personne pour s\'occuper de mon chien';
  //    	$user2->roles()->attach($role_senior);
  //       $user2->save();
       
        
  //       $user3 = new User;
  //       $user->name = 'eric';
  //       $user->mail = 'eric@example.com';
  //       $user3->password = bcrypt('eric10');

  //       $user3->description = 'Bonjour, je suis Eric. Je suis spécialisé en jardinage, taille de haies et de buissons';
  //       $user3->roles()->attach($role_prestataire);
  //       $user3->save();
        
    }
}

