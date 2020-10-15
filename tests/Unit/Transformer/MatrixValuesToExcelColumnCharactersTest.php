<?php

declare(strict_types=1);

namespace Tests\Unit\Transformer;

use App\Math\Matrix;
use App\Transformer\MatrixValuesToExcelColumnCharacters;
use PHPUnit\Framework\TestCase;

class MatrixValuesToExcelColumnCharactersTest extends TestCase
{

    /**
     * @dataProvider productMatrixDataProvider
     */
    public function testTransform_product_matrix_values_to_excel_column_characters(array $given, array $expected): void
    {

        $productMatrix         = new Matrix($given);
        $productExpectedMatrix = new Matrix($expected);

        $transformer    = new MatrixValuesToExcelColumnCharacters();
        $result         = $transformer->transform($productMatrix);

        self::assertEquals($productExpectedMatrix, $result);
    }

    public function productMatrixDataProvider(): array
    {
        return [
            'product matrix 1' =>
                [
                    [
                        [1,2],
                        [1,2],
                    ],
                    [
                        ['A','B'],
                        ['A','B'],
                    ],
                ],
            'product matrix 2' =>
                [
                    [
                        [10,20],
                        [100,200],
                        [1000,2000],
                    ],
                    [
                        ['J','T'],
                        ['CV','GR'],
                        ['ALL','BXX'],
                    ],
                ],
        ];
    }
}
