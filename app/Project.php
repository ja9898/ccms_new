<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'projectName','projectDescription', 'projectType', 'startDate',
    ];
	
    protected $dates = [
        'created_at',
        'updated_at',
        'startDate',
        'endDate'
    ];
	
	public function customer()
    {
		return $this->belongsTo('App\User', 'user_id');
    }

    public function createdby()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function modifiedby()
    {
        return $this->belongsTo('App\User', 'modified_by');
    }

    public function lead()
    {
        return $this->belongsTo('App\Lead', 'lead_id');
    }
}
