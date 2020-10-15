<?php

declare(strict_types=1);

namespace App\Math;

use App\Exceptions\InvalidMatrixDimensionsException;

use App\Exceptions\MatrixMultiplicationException;

class Matrix
{
    /**
     * @var array
     */
    private $matrix;

    /**
     * @var int
     */
    private $rows;

    /**
     * @var int
     */
    private $columns;

    /**
     * @param array $matrix
     * @throws InvalidMatrixDimensionsException
     */
    public function __construct(array $matrix)
    {
        $this->buildMatrix($matrix);

        if (!$this->validDimensionsOfMatrix()) {
            throw new InvalidMatrixDimensionsException(
                'Matrix dimension is not valid for given matrix.'
            );
        }
    }

    public function toArray(): array
    {
        return $this->matrix;
    }

    public function rows(): int
    {
        return $this->rows;
    }

    public function columns(): int
    {
        return $this->columns;
    }

    public function multiply(self $matrix): self
    {
        if (!$this->canMultiply($matrix)) {
            throw new MatrixMultiplicationException(
                'MatrixB can not be multiplied by MatrixA because of inconsistent dimensions provided'
            );
        }

        $matrixA = $this->toArray();
        $matrixB = $matrix->toArray();
        $columnsCount = $matrix->columns;
        $productMatrix = [];

        foreach ($matrixA as $matrixArow => $rowData) {
            for ($column = 0; $column < $columnsCount; ++$column) {

                $columnData             = array_column($matrixB, $column);
                $sumOfProductMatrix     = 0;

                foreach ($rowData as $key => $valueData) {
                    $sumOfProductMatrix += $valueData * $columnData[$key];
                }

                $productMatrix[$matrixArow][$column] = $sumOfProductMatrix;
            }
        }

        return new self($productMatrix);
    }

    private function buildMatrix(array $matrix): void
    {
        if ($this->isVector($matrix)) {
            $this->rows = 1;
            $this->columns = count($matrix);
            $matrix = [$matrix];
        } else {
            $this->rows = count($matrix);
            $this->columns = is_countable($matrix[0]) ? count($matrix[0]) : 0;
        }

        $this->matrix = $matrix;
    }

    private function isVector(array $matrix): bool
    {
        return !is_array($matrix[0]);
    }

    public function validDimensionsOfMatrix(): bool
    {
        for ($i = 0; $i < $this->rows; ++$i) {
            if (
                is_countable($this->matrix[$i])
                && count($this->matrix[$i]) !== $this->columns
            ) {
                return false;
            }
        }

        return true;
    }

    public function canMultiply(Matrix $matrix): bool
    {
        return $this->columns === $matrix->rows;
    }

    public function containsOnlyNumbers(): bool
    {
        dump(array_filter($this->matrix, 'is_int'));
        return array_filter($this->matrix, 'is_int') === $this->matrix;
    }
}
