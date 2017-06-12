<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   $categories = [
                  [
                      'name' => 'bricolage',
                      'children' => [
                          ['name' => 'Peintre'],
                          ['name' => 'Plombier'],
                          ['name' => 'Menuisier'],
                          ['name' => 'Homme à tout faire'],
              
                      ]
                  ],
                  [
                      'name' => 'Animaux',
                      'children' => [
                          ['name' => 'Promenade chien'],
                          ['name' => 'Garde animaux'],
                          ['name' => 'Visite à domicile'],
                          ['name' => 'Toilettage'],
                      ]
                  ],
                  [
                      'name' => 'Aides ménagères',
                      'children' => [
                          ['name' => 'Cuisine'],
                          ['name' => 'Courses'],
                          ['name' => 'Repassage'],
                          ['name' => 'Nettoyage'],
                      ]
                  ],
                  [
                      'name' => 'Assistance à la personne',
                      'children' => [
                          ['name' => 'Soins à domicile'],
                          ['name' => 'Garde de sénior'],
                      ]
                  ],
                  [
                      'name' => 'Informatique',
                      'children' => [
                          ['name' => 'Cours,initiation informatique'],
                          ['name' => 'Réparation'],
                      ]
                  ],
                  [
                      'name' => 'Transport',
                      'children' => [
                          ['name' => 'Transport'],
                          ['name' => 'Livraison'],
                      ]
                  ],
                  [
                      'name' => 'Cours/distraction',
                      'children' => [
                          ['name' => 'Cours de langue'],
                          ['name' => 'Lecture'],
                          ['name' => 'Cours de musique'],
                          ['name' => 'Sport'],
                          ['name' => 'Cours particulier'],
                        ]
                    ],
                    [
                        'name' => 'Jardin',
                        'children' => [
                            ['name' => 'pelouse'],
                            ['name' => 'haie'],
                            ['name' => 'gros travaux'],
                      ]
                    ],
              ];

              foreach ($categories as $category) {
                  \App\Category::create($category);
              }
    }
    
}
