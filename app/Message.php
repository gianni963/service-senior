<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    protected $fillable = [
    	'sender_id', 'receiver_id', 'annonce_id', 'message','read'
    ];

    protected $appends=['sender', 'receiver'];

    public function annonce()
    {
        
        return $this->belongsTo(Annonce::class);
    }

    public function getSenderAttribute()
    {

    	return User::where('id', $this->sender_id)->first();

    }

    public function getReceiverAttribute()
    {

    	return User::where('id', $this->receiver_id)->first();
    	
    }

    public function getCreatedAtAttribute($value)
    {
    	return Carbon::parse($value)->diffForHumans();
    }
}
