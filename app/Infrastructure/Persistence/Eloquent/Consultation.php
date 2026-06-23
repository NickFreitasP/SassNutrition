<?php

namespace App\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\RedirectResponse;

class Consultation extends Model
{

    protected $fillable = [

     "patient_id",
     "appointment_date",
     "notes",
     "title"
    ];

    protected $casts = [
        'appointment_date' => 'datetime',
    ];

    public function patient(): BelongsTo
   {

    return  $this->belongsTo(Patient::class);

   }


}
