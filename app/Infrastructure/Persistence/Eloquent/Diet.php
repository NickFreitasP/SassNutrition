<?php

namespace App\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diet extends Model
{

    protected $fillable = [
     "patient_id",
     "title",
     "file_path",
     "uploaded_at"
    ];



     protected $casts = [
        'uploaded_at' => 'datetime',
    ];

   public function patient(): BelongsTo
   {

    return  $this->belongsTo(Patient::class);

   }



}
