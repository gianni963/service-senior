<?php

namespace App;

use App\Tag;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annonce extends Model
{   

	use SoftDeletes;
    use Searchable;
    protected $fillable = ['user_id','titre', 'contenu', 'zone_id', 'price', 'category_id'];
    protected $dates = ['deleted_at'];

 	public function scopeIsLive($query)
 	{
        return $query->where('live', true);
    }
    
    public function scopeIsNotLive($query)
    {
        return $query->where('live', false);
    }

   public function scopelastestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeFromCategory($query, Category $category)
    {
        return $query->where('category_id', $category->id);
    }

    public function live()
    {
        return $this->live;
    }

	public function user()
    {
        
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        
        return $this->belongsTo(Category::class);
    }

    public function message()
    {

        return $this->hasMany(Message::class);
    }
    
    public function tags()
    {

        return $this->belongsToMany(Tag::class);
    }

    public function zones()
    {

        return $this->belongsTo('App\Zone', 'zone_id');
    }

     public function getTagListAttribute(){
        return $this->tags->pluck('id')->all();
    }


}
