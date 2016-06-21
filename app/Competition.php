<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model {

	protected $primaryKey = 'Competitions_Id';






  public function awards()
    {
        return $this->belongsToMany('App\Award','award_competition','competition_id','award_id')
        ->withPivot('Total_Amount')
    	->withTimestamps();
    }




 public function presents()
    {
        return $this->hasMany('App\Present','Competitions_Id');
    }





}
