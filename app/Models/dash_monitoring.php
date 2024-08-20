<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dash_monitoring extends Model
{
    use HasFactory;

    protected $fillable = ['tim_kerja_id', 'nama_kegiatan', 'target', 'realisasi'];

    public function timKerja()
    {
        return $this->belongsTo(tim_kerja::class);
    }
}
