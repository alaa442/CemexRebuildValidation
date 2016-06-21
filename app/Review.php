<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $primaryKey = 'Review_Id';

    public function getcontractor()
    {
        return $this->belongsTo('App\Contractor','Contractor_Id');
    }
}
