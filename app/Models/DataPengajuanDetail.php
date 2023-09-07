<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengajuanDetail extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function dataPengajuan()
    {
        return $this->belongsTo(DataPengajuan::class, 'data_pengajuan_id');
    }
}
