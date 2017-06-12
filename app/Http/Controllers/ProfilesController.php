<?php

namespace App\Http\Controllers;
use App\User;
use App\Annonces;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    //profil public d'un utilisateur
    public function show(User $user)
    {
    	//dd($user->roles);
    	return view('user.profile.show',[

    		'profileUser' => $user,
    		'roles' => $user->roles,
    		'annonces' => $user->annonces()->paginate(10),

		]);
    }


    public function showAnnoncesByUser()
    {


    }
}
