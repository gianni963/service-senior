<?php

namespace Tests\Feature;

use App\Annonce;
use App\User;
use App\Tag;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaggableTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();
		Artisan::call('migrate');
	}
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateTags()
    {

    	$post = factory(Annonce::class, 3)->create();
    	$post->saveTags('info', 'jardin' ,'course');
    	$this->assertEquals(5, DB::table('annonces')->count());
    	$this->assertEquals(2, DB::table('annonce_tag')->count());

	
    }

    public function multipleTags()
    {

    	//factory(Article::class, 3)->create();
		// $post = new Annonce;
  //       $post->titre = 'titretest-2';
  //       $post->contenu = 'test multiple tags';
  //       $user =$post->user()->associate(1); 

		// $post2 = new Annonce;
  //       $post2->titre = 'titretest-2';
  //       $post2->contenu = 'test multiple tags';
  //       $user =$post2->user()->associate(1);


  //       $posts = Annonce::all();

  //       foreach($posts as $singlepost){
  //       	echo $singlepost->titre . ' ' . $singlepost->contenu;
  //       }

        // $post1->saveTags('informatique','nettoyage', 'lecture');
        // $post2->saveTags('informatique','bricolage', 'lecture');
        //$this->assertTrue(50, count($posts));
    }
}
