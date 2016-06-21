<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model {

	protected $primaryKey = 'Awards_Id';

	public function competitions()
    {
        return $this->belongsToMany('App\Competition','award_competition','competition_id','award_id')
        ->withPivot('Total_Amount')
    	->withTimestamps();
    }

public function apresents()
    {
        return $this->belongsToMany('App\Present','award_present','prese_id','award_id')
        ->withPivot('Amount')
    	->withTimestamps();
    }










}
