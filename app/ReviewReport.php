<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewReport extends Model
{
    protected $primaryKey = 'Review_Id';

    public function getcontractor()
    {
        return $this->belongsTo('App\Contractor','Contractor_Id');
    }
}
