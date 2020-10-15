<?php

declare(strict_types=1);

namespace App\Http\Handler;

use App\Contract\MatrixMultiplicationInterface;
use App\Contract\TransformerInterface;
use App\Math\Matrix;
use App\Http\Request\MatrixRequestDTO;
use Exception;

class MatrixMultiplicationHandler implements MatrixMultiplicationInterface
{
    /**
     * @var TransformerInterface
     */
    private $matrixValuesToExcelColumnCharacters;

    public function __construct(TransformerInterface $matrixValuesToExcelColumnCharacters)
    {
        $this->matrixValuesToExcelColumnCharacters = $matrixValuesToExcelColumnCharacters;
    }

    /**
     * @param MatrixRequestDTO $matrixRequestDTO
     *
     * @return Matrix
     *
     * @throws Exception
     */
    public function handle(MatrixRequestDTO $matrixRequestDTO): Matrix
    {
        $matrixA = new Matrix($matrixRequestDTO->matrixA());
        $matrixB = new Matrix($matrixRequestDTO->matrixB());

        $productMatrix = $matrixA->multiply($matrixB);

        return $this->matrixValuesToExcelColumnCharacters->transform($productMatrix);
    }
}
