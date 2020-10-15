<?php

declare(strict_types=1);

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ResponseJson
{
    /**
     * @var int
     */
    protected $statusCode = Response::HTTP_OK;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respondNotFound(string $message = 'Not found!'): JsonResponse
    {
        return $this
            ->setStatusCode(Response::HTTP_NOT_FOUND)
            ->respondWithError($message)
        ;
    }

    /**
     * @param mixed $data
     */
    public function respond($data, array $headers = []): JsonResponse
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError(string $message): JsonResponse
    {
        return $this->respond([
          'error' => [
              'message' => $message,
              'status_code' => $this->getStatusCode()
          ]
        ]);
    }

    public function respondInternalError(string  $message = 'Internal Error!'): JsonResponse
    {
        return $this
            ->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)
            ->respondWithError($message)
        ;
    }

    public function respondBadRequest(string  $message = 'Bad Request!'): JsonResponse
    {
        return $this
            ->setStatusCode(Response::HTTP_BAD_REQUEST)
            ->respondWithError($message)
        ;
    }

    public function respondWithValidationError(string  $message): JsonResponse
    {
        return $this
            ->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->respondWithError($message)
        ;
    }

}
