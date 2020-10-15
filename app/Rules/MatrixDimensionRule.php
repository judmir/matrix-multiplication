<?php

namespace App\Rules;

use App\Exceptions\InvalidMatrixDimensionsException;
use App\Math\Matrix;
use Illuminate\Contracts\Validation\Rule;

class MatrixDimensionRule implements Rule
{
    /**
     * @param $attribute
     * @param mixed $matrixArray
     *
     * @return bool
     */
    public function passes($attribute, $matrixArray): bool
    {
        if (!is_array($matrixArray) || !isset($matrixArray[0])) {
            return false;
        }

        return $this->checkIfMatrixDimensionsAreValid($matrixArray);
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return ':attribute not a valid Matrix. Dimensions for rows and columns does not match.';
    }

    /**
     * @param mixed $matrix
     *
     * @return bool
     */
    private function checkIfMatrixDimensionsAreValid($matrix): bool
    {
        if (!is_array($matrix) || empty($matrix)) {
            return false;
        }

        try {
            new Matrix($matrix);
        } catch (InvalidMatrixDimensionsException $exception) {
            return false;
        }

        return true;
    }
}
