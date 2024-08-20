<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tim_kerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tim',
        'nama_ketua'
    ];

    public function kinerjas()
    {
        return $this->hasMany(tab_kinerja::class, 'tim_kerja_id');
    }

    public function monitoringKegiatan()
    {
        return $this->hasMany(dash_monitoring::class);
    }
}
