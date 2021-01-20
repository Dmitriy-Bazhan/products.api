<?php

namespace App\Helpers;

use App\Helpers\Interfaces\SimpleNumberArray;

class GetArray implements SimpleNumberArray
{
    public function createArray($number)
    {
        $array = [];
        for ($i = 0; $i <= $number; $i++) {
            $array[] = $i;
        }

        return $array;
    }
}
