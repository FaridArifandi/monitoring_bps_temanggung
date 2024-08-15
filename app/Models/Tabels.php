<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabels extends Model
{
    use HasFactory;

    public static function getKinerjaData()
    {
        return [
            [
                'no' => 1,
                'nama_kegiatan' => 'Proyek A',
                'tim_kerja' => 'Tim Alpha',
                'periode_kegiatan' => 'Jan 2024 - Mar 2024',
                'target' => '100',
                'realisasi' => '90',
                'satuan' => 'Dokumen',
                'link' => 'ini link',
                'ket' => 'ini keterangan',
            ],
            [
                'no' => 2,
                'nama_kegiatan' => 'Proyek B',
                'tim_kerja' => 'Tim Beta',
                'periode_kegiatan' => 'Feb 2024 - Apr 2024',
                'target' => '200',
                'realisasi' => '140',
                'satuan' => 'Dokumen',
                'link' => 'ini link',
                'ket' => 'ini keterangan',
            ],
        ];
    }

    public static function getTimData()
    {
        return [
            [
                'no' => 1,
                'nama_tim' => 'Tim Alpha',
                'ketua' => 'Andi',
            ],
            [
                'no' => 2,
                'nama_tim' => 'Tim Beta',
                'ketua' => 'Budi',
            ],
        ];
    }


}
