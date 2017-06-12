<?php

namespace App\Http\Controllers\Annonces;

use Illuminate\Support\Facades\Auth;
use App\Annonce;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAnnonce;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AnnoncesController extends Controller
{
    public function index(Category $category)
    {

        //dernières annonces
        $annonces = Annonce::with('user','category')->isLive()->lastestFirst()->paginate(10);

       
        
        return view('annonces.index',compact('annonces','category'));
    }

    public function SelectAnnoncesCategory(Request $request)
    {
      //selection par catégorie et ville sur la page d'accueil
        $annonces = Annonce::isLive()->where('category_id', $request->category_id)
        ->where('zone_id', $request->zone_id)
        ->lastestFirst()
        ->paginate(10);

        $category = $request->category_id;
        $zone = $request->zone_id;
        //dd($category);
         Session::put('category', $category);
         Session::put('zone', $zone);
         //dd(Session::all());
        return view('annonces.index',['annonces'=>$annonces,'category'=>$category,'zone'=>$zone]);
    }

    public function AnnoncesByPrestataires(Request $request, Category $category, Annonce $annonce)
    {
        //filter les résulats d'annonces par prestataires
       $category=Session::get('category'); 
       $zone=Session::get('zone'); 
        $annonces = Annonce::isLive()
        ->where('category_id',$category)
        ->where('zone_id', $zone)
        ->lastestFirst()
        ->paginate(10);

        return view('annonces.annonces_prestataires', compact('annonces'));
    }

    public function AnnoncesBySeniors(Request $request, Category $category, Annonce $annonce)
    {
        //filter les résulats d'annonces par prestataires
        $category=Session::get('category'); 
        $zone=Session::get('zone'); 
        $annonces = Annonce::isLive()
        ->where('category_id',$category)
        ->where('zone_id', $zone)
        ->lastestFirst()
        ->paginate(10);

        return view('annonces.annonces_seniors', compact('annonces'));
    }


    public function create()
    {
        // rechercher les tags afin de les afficher dans le formulaire d'annonces
        
        $tags = Tag::pluck('name','id');
      
        //renvoie la page de création d'annonce
    	return view('annonces.create', compact('tags'));
    }

    //Request StoreAnnonce passée en paramètre
    public function store(StoreAnnonce $request, Tag $tags)
    {   
        
         $annonce = Annonce::create([
                'titre' => request('titre'),
                'zone_id' => request('zone_id'),
                'contenu' => request('contenu'),
                'price' => request('price'),
                'user_id' => auth()->id(),
                'category_id' => request('category_id')
            ]);
        //associe les tags
         $tagsIds = $request->input('tags');
         $annonce->tags()->attach($tagsIds);

         return redirect()->route('annonce.edit',compact('annonce','tags'));
    }

    public function edit(Request $request, Annonce $annonce, Tag $tags)
    {

        //éditer une annonce
        $tags = Tag::pluck('name', 'id');
        
    
        
        $this->authorize('edit', $annonce);
        
        
        return view('annonces.edit', compact('annonce', 'tags'));    

    }

    public function update(StoreAnnonce $request, Annonce $annonce)
    {
        //modifier une annonce
        $this->authorize('update', $annonce);

        $annonce->titre = $request->titre;
        $annonce->contenu = $request->contenu;
        if(!$annonce->live()){
            $annonce->category_id = $request->category_id;
        }
        if(!$annonce->live()){
            $annonce->zone_id = $request->zone_id;
        }
         if(!$annonce->live()){
            $annonce->price = $request->price;
        }
        $this->syncTags($annonce , $request->input('tags'));

        //si l'utilisateur est un sénior l'annonce sera directement mise en ligne
        if(auth()->user()->hasRole('senior')){
            
            $annonce->live = true;

        }

        $annonce->save();

        if($request->has('paypost'))
        {
            return redirect()->route('annonce.payment.form', $annonce);
        }

        if(auth()->user()->hasRole('senior')){

            return back()->withSuccess("L'annonce est en ligne");
        }

        if(auth()->user()->hasRole('prestataire')){

            return back()->withSuccess("L'annonce a été modifiée");
        }
    }


    public function syncTags(Annonce $annonce,$tags)
    {
        
        $annonce->tags()->sync($tags);
    }

    public function show(Request $request, Annonce $annonce)
    {
        //Afficher une annonce par id
        if(!$annonce->live()){
            abort(404);
        }

        return view('annonces.show', compact('annonce'));
    }



    public function destroy(Annonce $annonce)
    {
        //supprimer une annonce
        $annonce->delete();

        return back()->withSuccess('Annonce supprimée');
    }
    
}
