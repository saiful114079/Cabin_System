<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CabinBooking extends Model
{
    protected $guarded = [];
    public function cabin(){
        return $this->belongsTo(CabinInfo::class,'cabin_no','cabin_no');
    }

}
