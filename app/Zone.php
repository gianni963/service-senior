<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public $timestamps = false;
    protected $fillable= ['name' , 'slug'];

	public function annonces()
    {
    	return $this->hasMany(Annonce::class);
    }
    
}
