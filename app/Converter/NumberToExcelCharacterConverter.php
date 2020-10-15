<?php

declare(strict_types=1);

namespace App\Converter;

use App\Contract\ConverterInterface;

class NumberToExcelCharacterConverter implements ConverterInterface
{
    private const ALPHABETIC_MAXIMUM_COLUMN_NUMBER = 26;
    private const ASCII_CODE_FOR_UPPER_CASE_CHARACTERS = 65;

    public static function convert(int $matrixNumber): string
    {
        $characterIndex         = ($matrixNumber - 1) % self::ALPHABETIC_MAXIMUM_COLUMN_NUMBER;
        $excelColumnCharacter   = chr(self::ASCII_CODE_FOR_UPPER_CASE_CHARACTERS + $characterIndex);

        $numberLeftToBeConverted = (int) (($matrixNumber - 1) / self::ALPHABETIC_MAXIMUM_COLUMN_NUMBER);

        if (self::canStillBeConverted($numberLeftToBeConverted)) {
            return self::convert($numberLeftToBeConverted) . $excelColumnCharacter;
        }

        return $excelColumnCharacter;
    }

    private static function canStillBeConverted(int $numberLeftToBeConverted): bool
    {
        return $numberLeftToBeConverted > 0;
    }
}
