<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CguController extends Controller
{
      public function index() {
      	//affiche la vue des conditions générales d'utilisation
        return view('cgu.index');
    }

}
