<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VerifikasiLanjutan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function dataPengajuan(): BelongsTo
    {
        return $this->belongsTo(DataPengajuan::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verifikator_id');
    }
}
