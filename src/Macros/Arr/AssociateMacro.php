<?php

namespace SirMathays\Convenience\Macros\Arr;

use Closure;
use RuntimeException;

/**
 * @mixin \Illuminate\Support\Arr
 */
class AssociateMacro
{
    public function __invoke(): Closure
    {
        return function (array $array, $fill = null, bool $strict = false) {
            $transformed = [];

            foreach ($array as $key => $value) {
                if (is_string($key)) {
                    static::set($transformed, $key, $value);
                } elseif (is_string($value) || is_int($value)) {
                    static::set($transformed, $value, value($fill, $value, $key));
                } elseif ($value instanceof Closure) {
                    static::set($transformed, $value(), value($fill, $value(), $key));
                } elseif ($strict) {
                    throw new RuntimeException(sprintf(
                        "Invalid value given at '%s' to create an associative array.", $key
                    ));
                }
            }

            return $transformed;
        };
    }
}
