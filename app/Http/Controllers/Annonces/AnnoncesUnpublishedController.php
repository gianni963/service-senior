<?php

namespace App\Http\Controllers\Annonces;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnoncesUnpublishedController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth']);
    }

    public function index (Request $request)
    {
        //annonces pas encore publiées
    	$annonces = $request->user()->annonces()->isNotLive()->lastestFirst()->paginate(10);
    	
    	return view('user.unpublished.index', compact('annonces')) ;
    }
}
