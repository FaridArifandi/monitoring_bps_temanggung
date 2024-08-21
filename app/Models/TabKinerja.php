<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabKinerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'tim_kerja_id',
        'user_id',
        'periode_kegiatan',
        'target',
        'realisasi',
        'satuan',
        'link_bukti_dukung',
        'keterangan',
    ];

    public function tim_Kerja()
    {
        return $this->belongsTo(TimKerja::class, 'tim_kerja_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
