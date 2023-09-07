<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;
    // Model Regency.php
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
