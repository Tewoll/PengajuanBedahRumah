<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubKategoriVerifikasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriVerifikasi::class);
    }
    public function detailSubKategori():HasMany
    {
        return $this->hasMany(DetailSubKategoriVerifikasi::class, 'sub_ktgr_verifikasi_id', 'id');
    }
}
