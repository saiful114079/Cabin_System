<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CabinInfo extends Model
{
    protected $guarded = [];

    public function doctor(){
        return $this->belongsTo(DoctorList::class);
    }

    public function patient(){
        return $this->belongsTo(PatientList::class);
    }

}
