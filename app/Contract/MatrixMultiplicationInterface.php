<?php

declare(strict_types=1);

namespace App\Contract;

use App\Math\Matrix;
use App\Http\Request\MatrixRequestDTO;
use Exception;

interface MatrixMultiplicationInterface
{
    /**
     * @param MatrixRequestDTO $matrixRequestDTO
     *
     * @return Matrix
     *
     * @throws Exception
     */
    public function handle(MatrixRequestDTO $matrixRequestDTO): Matrix;
}
