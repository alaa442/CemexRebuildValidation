<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Present extends Model {

	protected $primaryKey = 'Presents_Id';


 public function getcompetitions()
    {
        return $this->belongsTo('App\Competition','competition_id');
    }


 public function getcontractors()
    {
        return $this->belongsTo('App\Contractor','contractor_id');
    }

public function getwards()
    {
        return $this->belongsToMany('App\Award','award_present','prese_id','award_id')
        ->withPivot('Amount')
    	->withTimestamps();
    }








}
