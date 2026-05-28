<?php

namespace App\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Persistence\Eloquent\Patient ;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeightEntry extends Model
{

    protected $fillable = [

       "patient_id",
       "weight",
       "recorded_at"
    ];

    protected $casts = [
        'recorded_at' => 'datetime',
    ];

    public function patient() : BelongsTo

    {

       return $this->belongsTo(Patient::class);

    }

}
