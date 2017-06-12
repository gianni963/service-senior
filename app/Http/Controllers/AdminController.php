<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Tag;
use App\Role;
use App\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index()
    {
        //affiche les annonces, les tags et les utilisateurs dans le tableau de bord
        $annonces = Annonce::paginate(10);;
        $users = User::paginate(10);;
        $tags = Tag::paginate(10);;
        
        return view('admin.index',compact('annonces','users','tags'));
    }


    public function deleteAd($id)
    {
    	$annonce = Annonce::findOrFail($id);
    	//dd($annonce);
        $annonce->delete();

        return back()->withSuccess('Cette annonce a bien été supprimée');


    }

    public function deleteUser($id)
    {
    	$user = User::findOrFail($id);
    	//dd($annonce);
        $user->delete();

        return back()->withSuccess('Cet utilisateur a bien été supprimée');

    }

    public function deleteTag($id)
    {

        $tag = Tag::findOrFail($id);

        $tag->delete();
        return back()->withSuccess('Tag supprimé');
    }






}
