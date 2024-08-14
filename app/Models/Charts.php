<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charts extends Model
{
    use HasFactory;

    public static function getDummyData()
    {
        return [
            [
                'name' => 'Organic',
                'color' => '#1A56DB',
                'data' => [
                    ['x' => 'Mon', 'y' => 231],
                    ['x' => 'Tue', 'y' => 122],
                    ['x' => 'Wed', 'y' => 63],
                    ['x' => 'Thu', 'y' => 421],
                    ['x' => 'Fri', 'y' => 122],
                    ['x' => 'Sat', 'y' => 323],
                    ['x' => 'Sun', 'y' => 111],
                ],
            ],
            [
                'name' => 'Social media',
                'color' => '#FDBA8C',
                'data' => [
                    ['x' => 'Mon', 'y' => 232],
                    ['x' => 'Tue', 'y' => 113],
                    ['x' => 'Wed', 'y' => 341],
                    ['x' => 'Thu', 'y' => 224],
                    ['x' => 'Fri', 'y' => 522],
                    ['x' => 'Sat', 'y' => 411],
                    ['x' => 'Sun', 'y' => 243],
                ],
            ]
        ];
    }
}
