<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Promoter extends Model
{


    protected $primaryKey ='Pormoter_Id';
       protected $fillable = array(
        'Pormoter_Name',
    );
 
    public function getvisit()
  	{

    	return $this->hasMany('App\Visit','Pormoter_Id');
    }
 public function getcontractor()
  	{

    	return $this->hasMany('App\Contractor','Pormoter_Id');
    }



}