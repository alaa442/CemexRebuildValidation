<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    
    
	protected $primaryKey = 'Contractor_Id';

	public function getreview()
    {
        return $this->hasOne('App\Review','Contractor_Id');
    }

    public function getpromoter()
    {   
        return $this->belongsTo('App\Promoter','Pormoter_Id');
    }
     
    public function getproject()
  	{

    	return $this->hasMany('App\Visit','Contractor_Id');
    }
	
	public function presents()
    {
        return $this->hasMany('App\Present');
          
    }
    

}
