<?php

declare(strict_types=1);

namespace App\Contract;

use App\Math\Matrix;

interface TransformerInterface
{
    public function transform(Matrix $matrixProduct): Matrix;
}
