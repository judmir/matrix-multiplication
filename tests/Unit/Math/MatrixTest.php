<?php

declare(strict_types=1);

namespace Tests\Unit\Math;

use App\Exceptions\InvalidMatrixDimensionsException;
use App\Exceptions\MatrixMultiplicationException;
use App\Math\Matrix;
use PHPUnit\Framework\TestCase;

class MatrixTest extends TestCase
{
    /**
     * @dataProvider matrixDataProvider
     */
    public function testCreate_matrix_from_array(array $givenMatrix, $expectedColumns, $expectedRows): void
    {
        $matrix = new Matrix($givenMatrix);

        self::assertEquals($matrix->columns(), $expectedColumns);
        self::assertEquals($matrix->rows(), $expectedRows);
    }

    public function testCreate_matrix_from_vector(): void
    {
        $matrix = new Matrix([1, 2, 3]);

        self::assertEquals($matrix->toArray(), [
            [1, 2, 3]
        ]);
    }

    public function testException_on_invalid_dimensions(): void
    {
        $this->expectException(InvalidMatrixDimensionsException::class);
        $this->expectExceptionMessage('Matrix dimension is not valid for given matrix.');

        new Matrix([
           [1,2],
           [1,3,4],
           [1,2],
        ]);
    }

    public function testException_on_matrices_not_being_able_to_be_multiplied(): void
    {
        $this->expectException(MatrixMultiplicationException::class);
        $this->expectExceptionMessage('MatrixB can not be multiplied by MatrixA because of inconsistent dimensions provided');

        $matrixA = new Matrix([
           [1,2, 4],
           [1,3,4],
           [1,3,4],
        ]);

        $matrixB = new Matrix([
            [1,2, 4],
            [1,3,4],
        ]);

        $matrixA->multiply($matrixB);
    }

    public function matrixDataProvider(): array
    {
        return [
            'I can create a matrix from a multidimensional array, columns, rows, valid dimensions' => [
                [
                    [1, 2, 3],
                    [2, 3, 4]
                ],
                3,
                2
            ]
            ,'I can create a matrix from a multidimensional array1, columns, rows, valid dimensions' => [
                [
                    [0, 1, 2, 3],
                    [5, 2, 3, 4],
                    [5, 2, 3, 4],
                    [5, 2, 3, 4],
                    [5, 2, 3, 4],
                ],
                4,
                5
            ]
        ];
    }
}
