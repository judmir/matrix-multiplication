<?php

declare(strict_types=1);

namespace Tests\Unit\Converter;

use App\Converter\NumberToExcelCharacterConverter;
use PHPUnit\Framework\TestCase;

class NumberToExcelCharacterConverterTest extends TestCase
{

    /**
     * @dataProvider numbersDataProvider
     */
    public function testConvert_will_convert_number_To_excel_related_character(int $given, string $expected): void
    {
        self::assertEquals($expected, NumberToExcelCharacterConverter::convert($given));
    }

    public function numbersDataProvider(): array
    {
        return [
            [1,'A'],
            [2,'B'],
            [10,'J'],
            [20,'T'],
            [28,'AB'],
            [100,'CV'],
            [200,'GR'],
            [1000,'ALL'],
            [2000,'BXX'],
        ];
    }
}
