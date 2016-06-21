<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $primaryKey ='Visits_id';
  
    protected $fillable = array('Pormoter_Id','Contractor_Id'); 


    public function getusername()
    {   
        return $this->belongsTo('App\Promoter','Pormoter_Id');
    }
    
   public function getcontractorproject()
    {   
        return $this->belongsTo('App\Contractor','Contractor_Id');
    }
 
}