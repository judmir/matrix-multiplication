<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\InvalidMatrixDimensionsException;
use App\Exceptions\MatrixMultiplicationException;
use App\Http\Handler\MatrixMultiplicationHandler;
use App\Http\Request\MatrixRequestDTO;
use App\Http\Response\ResponseJson;
use App\Rules\MatrixDimensionRule;
use App\Rules\MatrixMultiplyOperationRule;
use ErrorException;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class MatrixMultiplicationController extends Controller
{
    public function __invoke(Request $request, MatrixMultiplicationHandler $matrixMultiplicationHandler, ResponseJson $responseJson): JsonResponse
    {
        $this->validate($request, [
            'matrixA' => [
                'sometimes',
                'bail',
                'required',
                'array',
                new MatrixDimensionRule()
            ],
            'matrixB' => [
                'sometimes',
                'bail',
                'required',
                'array',
                new MatrixDimensionRule(),
                new MatrixMultiplyOperationRule(
                    $request->get('matrixA', [])
                )
            ],
        ]);

        if (empty($request->all())) {
            throw new BadRequestHttpException('Bad request');
        }

        try {
            $matrixDTO      = MatrixRequestDTO::createFromRequest($request);
            $matrixProduct  = $matrixMultiplicationHandler->handle($matrixDTO);

            return $responseJson->respond($matrixProduct->toArray());

        } catch (MatrixMultiplicationException | InvalidMatrixDimensionsException  $exception) {
            return $responseJson->respondWithError($exception->getMessage());
        } catch (Exception | ErrorException $exception) {
            return $responseJson->respondBadRequest($exception->getMessage());
        }
    }
}
