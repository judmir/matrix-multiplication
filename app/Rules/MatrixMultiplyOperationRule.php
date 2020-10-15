<?php

namespace App\Rules;

use App\Math\Matrix;
use Illuminate\Contracts\Validation\Rule;

/**
 * For matrix multiplication, the number of columns in the first matrix must be equal to the number of rows in the second matrix.
 */
class MatrixMultiplyOperationRule implements Rule
{
    /**
     * @var array
     */
    private $matrixAArray;

    public function __construct($matrixAArray)
    {
        $this->matrixAArray = $matrixAArray;
    }

    /**
     * @param  string  $attribute
     * @param  mixed  $matrixBArray
     * @return bool
     */
    public function passes($attribute, $matrixBArray): bool
    {
        $matrixA = new Matrix($this->matrixAArray);
        $matrixB = new Matrix($matrixBArray);

        return $matrixA->canMultiply($matrixB);
    }

    public function message(): string
    {
        return 'MatrixB is not able to multiplied by matrixA. [RULE]: A matrix can be multiplied by any other matrix that has the same number of rows as the first has columns.';
    }
}
