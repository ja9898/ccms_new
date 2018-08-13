<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    //
	    protected $fillable = [
        'businessName','businessNature', 'description', 'user_id',
    ];
	
    protected $dates = [
        'created_at',
        'updated_at'
    ];
	
	
	public function user()
    {
        //return $this->belongsTo('App\User');
		return $this->belongsTo('App\User', 'user_id');
    }
	
	public function recording()
    {
		return $this->hasMany('App\Recording');
    }
}


