<?php

declare(strict_types=1);

namespace App\Http\Request;

use Illuminate\Http\Request;

class MatrixRequestDTO
{
    /**
     * @var array
     */
    private $matrixA;

    /**
     * @var array
     */
    private $matrixB;

    private function __construct(array $matrixA, array $matrixB)
    {
        $this->matrixA = $matrixA;
        $this->matrixB = $matrixB;
    }

    public static function createFromRequest(Request $request): self
    {
        $matrixA = $request->get('matrixA', []);
        $matrixB = $request->get('matrixB', []);

        return new self($matrixA, $matrixB);
    }

    public function matrixA(): array
    {
        return $this->matrixA;
    }

    public function matrixB(): array
    {
        return $this->matrixB;
    }
}
