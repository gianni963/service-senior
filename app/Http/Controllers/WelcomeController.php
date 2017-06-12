<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Message;
use App\Annonce;
use App\User;
use App\Category;


class WelcomeController extends Controller
{
    public function Welcome(Category $catergory)
    {
    	//page d'acceuil
    	return view('welcome.home');
    }





}
