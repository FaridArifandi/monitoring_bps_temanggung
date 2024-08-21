<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashMonitoring extends Model
{
    use HasFactory;

    protected $fillable = ['tim_kerja_id', 'nama_kegiatan', 'target', 'realisasi'];

    public function timKerja()
    {
        return $this->belongsTo(TimKerja::class);
    }
}
