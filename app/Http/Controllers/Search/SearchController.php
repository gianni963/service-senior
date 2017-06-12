<?php

namespace App\Http\Controllers\Search;

use App\Annonce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$error = ['error' => 'Aucun résulats trouvés'];
    
    //si l'utilisateur entre un mot clé
	    // if($request->has('q')){
	    // 	$annonces = Annonce::search($request->get('q'))->get();
	    // 	return $annonces->count()? $annonces : $error;
	    // }else{
	    // 	$annonces = Annonce::all();
	    // 	return('search')->withAnnonce($annonces);
	    // }
	    $annonces =  Annonce::search($request->search)->paginate(10);
	    return view('search.search', compact('annonces'));
    }
}
