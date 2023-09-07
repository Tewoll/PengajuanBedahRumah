<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Province extends Model
{
    use HasFactory;
    
    // public function cities(): BelongsTo
    // {
    //     return $this->belongsTo(Regency::class, 'province_id', 'id');
    // }
    public function cities(): HasMany
    {
        return $this->hasMany(Regency::class);
    }
    public function districts(): HasManyThrough
    {
        return $this->hasManyThrough(District::class, Regency::class);
    }

    public function villages(): HasManyThrough
    {
        return $this->hasManyThrough(Village::class, District::class);
    }
}
