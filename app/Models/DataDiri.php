<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataDiri extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }
}
