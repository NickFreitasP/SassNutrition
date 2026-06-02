<?php

namespace App\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{

    protected $fillable = [
        'nutritionist_id',
        'name',
        'email',
        'birth_date',
        'height',
        'notes',
        'phone',
        'weight',
        'image',
        'age',
        'objective',
        'dietary_restrictions',
        'gender',
        'food_preferences',
        'observations',
        'occupation',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function nutritionist(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nutritionist_id');
    }

   public function diets(): HasMany
   {
    return $this->hasMany(Diet::class);
   }

    public function weightEntries(): HasMany
   {
    return $this->hasMany(WeightEntry::class);
   }



}
