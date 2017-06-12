<?php

namespace App\Http\Controllers\Annonces;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnoncesPublishedController extends Controller
{
        public function __construct()
    {
    	$this->middleware(['auth']);
    }

    public function index (Request $request)
    {

        //annonces publiées
    	$annonces = $request->user()->annonces()->isLive()->lastestFirst()->paginate(10);
    	
    	return view('user.published.index', compact('annonces')) ;
    }
}

