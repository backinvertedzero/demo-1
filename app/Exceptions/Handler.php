<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler
{
    public function render(Throwable $exception): JsonResponse
    {
        return match (true) {
            $exception instanceof ValidationException => $this->handleValidationException($exception),
            $exception instanceof BusinessValidationException => $this->handleBusinessValidationException($exception),
            default => $this->handleGenericException($exception),
        };
    }

    private function handleValidationException(ValidationException $exception): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => 'The given data was invalid.',
            'errors' => $exception->errors(),
            'error_code' => 'VALIDATION_FAILED',
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    private function handleBusinessValidationException(BusinessValidationException $exception): JsonResponse
    {
        return $this->buildResponse(
            message: $exception->getMessage(),
            statusCode: $exception->getCode() ?: Response::HTTP_UNPROCESSABLE_ENTITY,
            errorCode: 'HTTP_UNPROCESSABLE_ENTITY',
        );
    }

    private function handleGenericException(Throwable $exception): JsonResponse
    {
        $response = $this->buildResponse(
            message: $exception->getMessage(),
            statusCode: Response::HTTP_INTERNAL_SERVER_ERROR,
            errorCode: 'INTERNAL_ERROR'
        );

        return $response;
    }

    private function buildResponse(
        string $message,
        int $statusCode,
        string $errorCode,
    ): JsonResponse {
        $response = [
            'success' => false,
            'message' => $message,
            'error_code' => $errorCode,
        ];


        return response()->json($response, $statusCode);
    }
}
