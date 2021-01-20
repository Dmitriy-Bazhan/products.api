<?php

namespace App\Helpers;

use App\Helpers\Interfaces\SimpleNumberArray;
use Illuminate\Support\Facades\Cache;
use App\Helpers\GetArray;

class GetCacheArray extends GetArray
{
    public function createArray($number)
    {
        if (!Cache::has($number)) {
            $array = $this->createArray($number);
            Cache::put($number, $array);

        } else {
            $array = Cache::get($number);
        }
        return $array;
    }
}
