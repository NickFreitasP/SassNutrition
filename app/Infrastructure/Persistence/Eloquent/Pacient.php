<?php

namespace App\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Pacient extends Model
{

    protected $fillable = [
        'nutritionist_id',
        'name',
        'email',
        'birth_date',
        'height',
        'notes',
        "phone",
        "weight"
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function nutritionist(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nutritionist_id');
    }



}
