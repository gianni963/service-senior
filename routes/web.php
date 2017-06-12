<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'WelcomeController@welcome')->name('home');
Route::get('/conditions_utilisation', 'CguController@index')->name('cgu');
Auth::routes();
Route::get('/braintree/token', 'BraintreeController@token');
//route responsable des recherches rapides
Route::get('/search', 'Search\SearchController@search')->name('search');

Route::get('/profil/{user}', 'ProfilesController@show')->name('publicProfile');
//Route::get('/tags/{tag}', 'TagstestController@index');
/*Route::get('/', function(\Illuminate\Http\Request $request){

	$user = $request->user();
	//dd($user->roles);
	$user->updatePermissions(['editpost']);
});
*/
Route::group(['middleware' => 'role:admin'], function(){


	Route::group(['middleware' => 'role:admin'], function(){
		Route::get('/admin/users', 'AdminController@index')->name('admin.index');
		Route::delete('/admin/deleteAd/{annonce}', 'AdminController@deleteAd')->name('admin.annonce.delete');
		Route::delete('/admin/deleteUser/{user}', 'AdminController@deleteUser')->name('admin.user.delete');
		Route::delete('/admin/deleteTag/{tag}', 'AdminController@deleteTag')->name('admin.tag.delete');

	});
	 
	
});

 Route::group(['middleware' => 'auth'], function(){
		
Route::group(['prefix'=>'/dashboard'], function(){
	 
   	Route::group(['middleware' => 'auth'], function(){

	Route::get('profil', 'DashboardController@index')->name('dashboard.index');
	//profil privé

	Route::patch('/profil/update', 'DashboardController@update')->name('profile.update');

	//messagerie
	Route::get('messages', 'Annonces\MessageController@getNewMessages')->name('getNewMessages');
	Route::get('receivedmessages', 'Annonces\MessageController@getReceivedMessages')->name('getReceivedMessages');
	Route::get('receivedmessage/{message}', 'Annonces\MessageController@getReceivedMessageById')->name('getReceivedMessageById');
	Route::get('messagessent', 'Annonces\MessageController@getMessagesSent')->name('getMessagesSent');
	Route::get('messagesent/{message}', 'Annonces\MessageController@getSentMessageById')->name('getSentMessageById');

	Route::post('receivedmessage/{message}/answer', 'Annonces\MessageController@answerMessage')->name('answerMessage');
	});	
	Route::get('/supprimer_compte', 'DashboardController@deleteAccountForm')->name('deleteAccountForm');
	Route::post('/supprimer_compte', 'DashboardController@deleteAccount')->name('deleteAccount');

});	
});

Route::group(['prefix'=>'/annonces', 'namespace' => 'Annonces'], function(){
	 
      
   Route::group(['middleware' => 'auth'], function(){
		

	
	//CRUD Annonce	
	
 		Route::get('/poster', 'AnnoncesController@create')->name('annonce.create');

		Route::post('/', 'AnnoncesController@store')->name('annonce.store');
		Route::get('/{annonce}/edit', 'AnnoncesController@edit')->name('annonce.edit');
		Route::patch('/{annonce}', 'AnnoncesController@update')->name('annonce.update');
		Route::delete('/{annonce}', 'AnnoncesController@destroy')->name('annonce.destroy');
		//paiment lors de la publication de l'annonce (prestataire)
		Route::get('/{annonce}/paiement', 'PayPostController@PaymentForm')->name('annonce.payment.form');

		Route::post('/{annonce}/paiement', 'PayPostController@Process')->name('annonce.payment.process');

		//envoie message
		Route::post('/{annonce}/send-message', 'MessageController@sendMessage')->name('sendMessage');

	});	

    	Route::get('/unpublished', 'AnnoncesUnpublishedController@index')->name('annonces.unpublished.index');
	 	Route::get('/published', 'AnnoncesPublishedController@index')->name('annonces.published.index');
	   	//Route::get('', 'AnnoncesController@index')->name('home');
	   
	   //get annonces par catégories et zones
	   	Route::post('/category', 'AnnoncesController@SelectAnnoncesCategory')->name('annonces.category');
	   	
	   	Route::get('/category/prestataire', 'AnnoncesController@AnnoncesByPrestataires')->name('annonces.prestataires');
	   	
	   	Route::get('/annoncescategories/seniors', 'AnnoncesController@AnnoncesBySeniors')->name('annonces.seniors');
	    Route::get('/{annonce}', 'AnnoncesController@show')->name('annonce.show');
	    


});


//classement des annonces par catégories - non nécessaire au stade actuel de l'application

// Route::group(['prefix' => '/categories' ], function(){


// 	Route::get('/', 'Category\CategoryController@allCategories')->name('category.allCategories');

// 	Route::group(['prefix' => '/{category}'], function(){

// 		Route::get('/annonces', 'Category\CategoryController@annoncesByCategories')->name('category.annoncesByCategories');
// 	});

// });


