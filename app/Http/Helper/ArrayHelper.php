<?php

namespace App\Http\Helper;

class ArrayHelper
{

    public static function ExplodeCommaUnique(string $value): array
    {
        return array_filter(array_unique(explode(",", $value)));
    }

}
