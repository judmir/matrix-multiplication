<?php

declare(strict_types=1);

namespace App\Transformer;

use App\Converter\NumberToExcelCharacterConverter;
use App\Contract\TransformerInterface;
use App\Math\Matrix;

class MatrixValuesToExcelColumnCharacters implements TransformerInterface
{
    public function transform(Matrix $matrixProduct): Matrix
    {
        $matrixProductResult = [];

        foreach($matrixProduct->toArray() as $rowKey => $row)
        {
            foreach($row as $columnKey => $column)
            {
                $matrixProductResult[$rowKey][$columnKey] = NumberToExcelCharacterConverter::convert($column);
            }
        }

        return new Matrix($matrixProductResult);
    }
}
