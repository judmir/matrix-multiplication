<?php

declare(strict_types=1);

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

/**
 * @codeCoverageIgnore
 */
class InvalidMatrixDimensionsException extends BadRequestException
{
}
