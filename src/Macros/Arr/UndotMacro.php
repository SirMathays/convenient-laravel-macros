<?php

namespace SirMathays\Convenience\Macros\Arr;

use Closure;

/**
 * @mixin \Illuminate\Support\Arr
 */
class UndotMacro
{
    public function __invoke(): Closure
    {
        return function (array $array) {
            $copy = [];
            foreach ($array as $key => $value) {
                static::set($copy, $key, $value);
            }

            return $copy;
        };
    }
}
