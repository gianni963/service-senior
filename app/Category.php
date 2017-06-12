<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
   	use NodeTrait;
   	
    protected $fillable= ['name' , 'slug'];

    public function getRouteKeyName()
    {

    	return 'slug';
    }

    public function annonces()
    {
    	return $this->hasMany(Annonce::class);
    }
}
