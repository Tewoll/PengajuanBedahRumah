<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriVerifikasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function subKategori():HasMany
    {
        return $this->hasMany(SubKategoriVerifikasi::class, 'kategori_verifikasi_id', 'id');
    }
}
