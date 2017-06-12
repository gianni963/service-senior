<?php

namespace App\Http\Controllers\Category;

use App\{Category, Annonce};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // public function allCategories()
    // {

    // 	$categories = Category::get()->toTree();

    // 	return view('categories.index', compact('categories'));
    // }

    //  public function AnnoncesByCategories(Category $category)
    // {

    // 	$annonces = Annonce::isLive(['user'])->fromCategory($category)->lastestFirst()->paginate();

    // 	return view('categories.annonces_categories', compact('categories', 'annonces'));
    // }
}
