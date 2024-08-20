<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tab_kinerja extends Model
{
    use HasFactory;

    public function tim_Kerja()
    {
        return $this->belongsTo(tim_kerja::class, 'tim_kerja_id');
    }
}
