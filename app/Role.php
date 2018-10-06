<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_title','permission',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/

    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    public function createdby(){
        return $this->belongsTo(User::class, 'user_id', 'id' );
      }
      
      public function modifiedby(){
        return $this->belongsTo( User::class, 'last_modified_by', 'id' );
      }
}

