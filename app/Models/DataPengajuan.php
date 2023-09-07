<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DataPengajuan extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function detail(): HasOne
    {
        return $this->hasOne(DataPengajuanDetail::class, 'data_pengajuan_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function verifikasi(): HasOne
    {
        return $this->hasOne(VerifikasiLanjutan::class, 'data_pengajuan_id');
    }

}
