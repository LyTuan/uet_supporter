<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socials extends Model
{
    //
      protected $fillable = [
        'useer_id', 'provider_user_id', 'provider',
    ];
    public function users(){
    	$this->belongTo(User::class);
    }
}
