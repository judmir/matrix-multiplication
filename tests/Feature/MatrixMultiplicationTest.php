<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class MatrixMultiplicationTest extends TestCase
{
    private const MATRIX_MULTIPLICATION_ENDPOINT = '/api/matrix-multiplication';

    public function testMultiply_on_no_payload_bad_request_Exception_thrown()
    {
        $response = $this->postJson(self::MATRIX_MULTIPLICATION_ENDPOINT);
        $response
            ->assertStatus(400)
            ->assertJsonPath('message', 'Bad request')
        ;
    }

    /**
     * @dataProvider payloadDataProvider
     */
    public function testPayload_validation(array $matricesPayload, int $expectedStatus, string $errorsPath, $expectedStatusMessage)
    {
        $response = $this->postJson(self::MATRIX_MULTIPLICATION_ENDPOINT, $matricesPayload);
        $response
            ->assertStatus($expectedStatus)
            ->assertJsonPath($errorsPath, $expectedStatusMessage)
        ;
    }

    /**
     * @dataProvider matrixMultiplicationDataProvider
     */
    public function testMatrix_multiplication_operation_support(array $matrixA, array $matrixB, int $expectedStatusCode, ?string $expectedStatusMessage): void
    {
        $expectedStatusMessage = !is_null($expectedStatusMessage) ? [$expectedStatusMessage] : null;

        $payload = ['matrixA' => $matrixA, 'matrixB' => $matrixB,];

        $response = $this->postJson(self::MATRIX_MULTIPLICATION_ENDPOINT, $payload);
        $response
            ->assertStatus($expectedStatusCode)
            ->assertJsonPath('errors.matrixB', $expectedStatusMessage);
    }

    /**
     * @dataProvider matrixMultiplicationMatrixProductDataProvider
     */
    public function testMatrix_multiplication_product(array $matrixA, array $matrixB, array $expectedMatrixProduct): void
    {
        $payload = ['matrixA' => $matrixA, 'matrixB' => $matrixB,];

        $response = $this->postJson(self::MATRIX_MULTIPLICATION_ENDPOINT, $payload);
        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJson($expectedMatrixProduct)
        ;
    }



    public function payloadDataProvider(): array
    {
        return [
            'Validation Failed on payload matrices as empty' => [
                ['matrixA' => '', 'matrixB' => ''],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors',
                [
                    'matrixA' => ['The matrix a field is required.'],
                    'matrixB' => ['The matrix b field is required.'],
                ],
            ],
            'Validation Failed on payload matrices given as not arrays' => [
                ['matrixA' => 'invalid_input', 'matrixB' => 'invalid_input'],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors',
                [
                    'matrixA' => ['The matrix a must be an array.'],
                    'matrixB' => ['The matrix b must be an array.'],
                ],
            ],
            'Validation Failed on payload matrices given as not valid Matrices (Dimension does not match) ' => [
                [
                    'matrixA' => [
                        [1,2],
                        [1,3,4],
                        [1,2],
                    ],
                    'matrixB' => [
                        [-1,2],
                        [1,3,4],
                    ],
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors',
                [
                    'matrixA' => ['matrix a not a valid Matrix. Dimensions for rows and columns does not match.'],
                    'matrixB' => ['matrix b not a valid Matrix. Dimensions for rows and columns does not match.'],
                ],
            ],
            'Validation Failed on payload matrices given as not valid Matrices (Matrices containing letters) ' => [
                [
                    'matrixA' => [
                        [1,2,'A'],
                        [1,3,4],
                        [1,2,6],
                    ],
                    'matrixB' => [
                        [-1,2,'B'],
                        [1,3,4],
                        [1,3,4],
                    ],
                ],
                Response::HTTP_BAD_REQUEST,
                'error',
                [
                    'message' => 'A non-numeric value encountered',
                    'status_code' => 400
                ],
            ],
            'Validation will pass on valid payload matrices given, arrays with correct dimensions, MatrixB can be multiplied by MatrixA' => [
                [
                    'matrixA' => [
                        [0,3,5],
                        [5,5,2],
                    ],
                    'matrixB' => [
                        [3,4],
                        [3,-2],
                        [4, -2],
                    ],
                ],
                Response::HTTP_OK,
                'errors',
                null,
            ],
            'Another test. Validation will pass on valid payload matrices given, arrays with correct dimensions, MatrixB can be multiplied by MatrixA' => [
                [
                    'matrixA' => [
                        [1, 2, 3],
                        [1, 3, 4],
                        [1, 2, 3],
                    ],
                    'matrixB' => [
                        [-1, 2, -3],
                        [1, 3, 4],
                        [1, 3, 4],
                    ],
                ],
                Response::HTTP_OK,
                'errors',
                null,
            ]
        ];
    }

    public function matrixMultiplicationDataProvider(): array
    {
        return [
            'Multiplication not supported on MatrixB not a valid Matrix to be multiplied. MatrixA array 2x3,MatrixB 2x2' => [
                [
                    [3, 4, 2],
                    [4, 5, 5],
                ],
                [
                    [3, 2],
                    [4,5],
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                'MatrixB is not able to multiplied by matrixA. [RULE]: A matrix can be multiplied by any other matrix that has the same number of rows as the first has columns.'
            ],
            'Multiplication not supported on MatrixB not a valid Matrix to be multiplied. MatrixA array 1x3,MatrixB 2x2' => [
                [
                    [-1, -3, 2],
                ],
                [
                    [3, 2],
                    [4,5],
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                'MatrixB is not able to multiplied by matrixA. [RULE]: A matrix can be multiplied by any other matrix that has the same number of rows as the first has columns.'
            ],
            'Multiplication Supported. MatrixA array 1x3,MatrixB 3x2' => [
                [
                    [-1, -3, 2],
                ],
                [
                    [3, 2],
                    [3, 2],
                    [4, 5],
                ],
                Response::HTTP_OK,
                null
            ],
            'Multiplication Supported. MatrixA array 3x3,MatrixB 3x2' => [
                [
                    [-1, -3, 2],
                    [-1, -3, 2],
                    [-1, -3, 2],
                ],
                [
                    [3, 2],
                    [3, 2],
                    [4, 5],
                ],
                Response::HTTP_OK,
                null
            ],
            'Multiplication Supported. MatrixA array 3x1,MatrixB 1x 2' => [
                [
                    [-1, -3, 2],
                    [-1, -3, 2],
                    [-1, -3, 2],
                ],
                [
                    [3, 2],
                    [3, 2],
                    [4, 5],
                ],
                Response::HTTP_OK,
                null
            ],
        ];
    }

    public function matrixMultiplicationMatrixProductDataProvider(): array
    {
        return [
            'Multiplication Supported. MatrixA array 3x2,MatrixB 3x2, matrix product 3x2' => [
                [
                    [1,2],
                    [2,4],
                    [3,5],
                ],
                [
                    [0, 2],
                    [1, 6],
                ],
                [
                    ['B', 'N'],
                    ['D', 'AB'],
                    ['E', 'AJ'],
                ],
            ],
        ];
    }
}
