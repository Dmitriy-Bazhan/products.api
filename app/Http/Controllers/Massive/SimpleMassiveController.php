<?php

namespace App\Http\Controllers\Massive;

use App\Helpers\Interfaces\SimpleNumberArray;
use App\Http\Controllers\Controller;

class SimpleMassiveController extends Controller
{
    public function getMassive (SimpleNumberArray $interface, $number) {

        $array = $interface->createArray($number);

        return response()->json(['success' => true, 'data' => $array], 200);
    }
}
