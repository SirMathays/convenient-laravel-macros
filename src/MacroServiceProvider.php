<?php

namespace SirMathays\Convenience;

use SirMathays\Convenience\Foundation\MacroServiceProvider as ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    protected static array $macros = [
        \Illuminate\Database\Eloquent\Builder::class => [
            'selectKey'             => Macros\Builder\SelectKeyMacro::class,
            'whereLike'             => Macros\Builder\WhereLikeMacro::class,
            'orWhereLike'           => Macros\Builder\WhereLikeOrMacro::class,
        ],
        \Illuminate\Database\Query\Builder::class => [
            'selectRawArr'          => Macros\Builder\SelectRawArrMacro::class,
        ],
        \Illuminate\Support\Collection::class => [
            'mergeMany'             => Macros\Collection\MergeManyMacro::class,
            'pluckMany'             => Macros\Collection\PluckManyMacro::class,
            'whereExtends'          => Macros\Collection\WhereExtendsMacro::class,
            'whereImplements'       => Macros\Collection\WhereImplementsMacro::class,
            'whereUses'             => Macros\Collection\WhereUsesMacro::class,
        ],
        \Illuminate\Support\Arr::class => [
            'combine'               => Macros\Arr\CombineMacro::class,
            'join'                  => Macros\Arr\JoinMacro::class,
            'undot'                 => Macros\Arr\UndotMacro::class,
            'unzip'                 => Macros\Arr\UnzipMacro::class,
            'zip'                   => Macros\Arr\ZipMacro::class,
        ],
        \Illuminate\Support\Str::class => [
            'wrap'                  => Macros\Str\WrapMacro::class
        ],
        \Illuminate\Support\Stringable::class => [
            'wrap'                  => Macros\Stringable\WrapMacro::class
        ],
        \Carbon\CarbonPeriod::class => [
            'collect'               => Macros\CarbonPeriod\CollectMacro::class
        ]
    ];
}