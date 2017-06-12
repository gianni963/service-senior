<?php

use Illuminate\Database\Seeder;
use App\Tag;
class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $tags =[
        	
     		[
                'name'    => 'aquarelle',
            ],	
    	 	[
                'name'    => 'aide',
            ],
            [
                'name'    => 'animal',
            ],
            [
                'name'    => 'animaux',
            ],
            [
                'name'    => 'arts',
            ],
             [
                'name'    => 'artisanat',
            ],
         	[
                'name'    => 'chat',
            ],
            [
                'name'    => 'chien',
            ],
          	[
                'name'    => 'cheveux',
            ],
         	[
                'name'    => 'coiffure',
            ],
            [
                'name'    => 'coach',
            ],
            [
                'name'    => 'cours',
            ],
            [
                'name'    => 'compagnie',
            ],
            [
                'name'    => 'cuisine',
            ],
         	[
                'name'    => 'cuisinier',
            ],
         	[
                'name'    => 'dessin',
            ],
            [
                'name'    => 'distraction',
            ],
            [
                'name'    => 'jardin',
            ],
         	[
                'name'    => 'haie',
            ],
            [
                'name'    => 'instrument',
            ],
            [
                'name'    => 'informatique',
            ],
  			[
                'name'    => 'fleurs',
            ],
            [
                'name'    => 'guitare',
            ],
          	[
                'name'    => 'garde',
            ],
            [
                'name'    => 'haie',
            ],
  			[
                'name'    => 'jardin',
            ],
            [
                'name'    => 'jardinier',
            ],
         	[
                'name'    => 'internet',
            ],
         	[
                'name'    => 'pelouse',
            ],
            [
                'name'    => 'piano',
            ],
            [
                'name'    => 'tonte',
            ],
            [
                'name'    => 'plantes',
            ],
         	[
                'name'    => 'plomberie',
            ],
            [
                'name'    => 'menuiserie',
            ],
         	[
                'name'    => 'menuiserie',
            ],
            [
                'name'    => 'musique',
            ],
        	[
                'name'    => 'prestataire',
            ],
         	[
                'name'    => 'repassage',
            ],
         	[
                'name'    => 'restauration',
            ],
         	[
                'name'    => 'repas',
            ],

            [
                'name'    => 'saxophone',
            ],
            [
                'name'    => 'senior',
            ],

 			[
                'name'    => 'soins',
            ],
            [
                'name'    => 'sport',
            ],
         	[
                'name'    => 'ébéniste',
            ],
            [
                'name'    => 'transport',
            ],
     		[
                'name'    => 'travaux',
            ],
            [
                'name'    => 'ordinateur',
            ],
            [
                'name'    => 'toilettage',
            ],
            [
                'name'    => 'relaxation',
            ],
         	[
                'name'    => 'windows',
            ],
            [
                'name'    => 'web',
            ],
            

        ];

        foreach ($tags as $tag){
            Tag::create($tag);
        }
    }
}
