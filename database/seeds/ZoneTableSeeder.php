<?php

use Illuminate\Database\Seeder;
use App\Zone;
class ZoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zones =[
        
            [
                'id'  => 1,
                'city'    => 'Brabant wallon',
                'slug'    => 'brabant_wallon',
           
            ],
            [
                'id'  => 2,
                'city'    => 'Bruxelles',
                'slug'    => 'bruxelles',
           
            ],
            [
                'id'  => 3,
                'city'    => 'Hainaut',
                'slug'    => 'hainaut',
           
            ],
            [
                'id'  => 4,
                'city'    => 'Liège',
                'slug'    => 'liege',
           
            ],
            [
                'id'  => 5,
                'city'    => 'Luxembourg',
                'slug'    => 'luxembourg',
           
            ],
            [
                'id'  => 6,
                'city'    => 'Namur',
                'slug'    => 'namur',
           
            ],
            [
                'id'  => 7,
                'city'    => 'Anvers',
                'slug'    => 'anvers',
           
            ],
            [
                'id'  => 8,
                'city'    => 'Brabant flammand',
                'slug'    => 'brabant_flammand',
            ],
            [
                'id'  => 9,
                'city'    => 'Flandre-Occidendale',
                'slug'    => 'flandre_occidentale',
            ],
            [
                'id'  => 10,
                'city'    => 'Flandre-Orientale',
                'slug'    => 'flandre_orientale',
            ],
            [
                'id'  => 11,
                'city'    => 'Limbourg',
                'slug'    => 'limbourg',
           ],
        ];


    	foreach ($zones as $zone){
            Zone::create($zone);
        }
	}
}
