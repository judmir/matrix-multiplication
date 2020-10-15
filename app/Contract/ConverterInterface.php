<?php

declare(strict_types=1);

namespace App\Contract;

interface ConverterInterface
{
    public static function convert(int $matrixNumber): string;
}
