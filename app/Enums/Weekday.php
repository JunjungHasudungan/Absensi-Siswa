<?php

namespace App\Enums;

enum Weekday: string
{
    case SENIN      = "Senin";
    case SELASA     = "Selasa";
    case RABU       = 'Rabu';
    case KAMIS      = 'Kamis';
    case JUMAT      = 'Jumat';

    public function getDayTeaching():string
    {
        return match($this){
            Weekday::SENIN     => 'Test1',
            Weekday::SELASA     => 'Test2',
            Weekday::RABU      => 'Test3',
            Weekday::KAMIS     => 'Test4',
            Weekday::JUMAT     => 'Test5',
        };
    }
}
