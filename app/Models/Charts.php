<?php

namespace App\Models;

class Charts
{
    private static $DummyData = [
        [
            'name' => 'Target',
            'color' => '#1A56DB',
            'data' => [
                ['x' => 'Tim Alpa', 'y' => 23],
                ['x' => 'Tim Betha', 'y' => 12],
                ['x' => 'Tim Theta', 'y' => 6],
            ],
        ],
        [
            'name' => 'Realisasi',
            'color' => '#FDBA8C',
            'data' => [
                ['x' => 'Tim Alpa', 'y' => 12],
                ['x' => 'Tim Betha', 'y' => 12],
                ['x' => 'Tim Theta', 'y' => 5],
            ],
        ]
    ];

    public static function getDummyData(){
        return collect (self::$DummyData);
    }
}
