<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tim',
        'nama_ketua'
    ];

    public function kinerjas()
    {
        return $this->hasMany(TabKinerja::class, 'tim_kerja_id');
    }

    public function monitoringKegiatan()
    {
        return $this->hasMany(DashMonitoring::class);
    }
}
