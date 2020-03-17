<?php

declare(strict_types=1);

namespace Ilyatos\ApiResponse;

use Illuminate\Http\JsonResponse;
use Ilyatos\ApiResponse\Contracts\Response;
use Ilyatos\ApiResponse\Exceptions\InvalidStatusCodeException;
use Symfony\Component\HttpFoundation\Response as FoundationResponse;

final class ApiResponse implements Response
{
    /**
     * @inheritDoc
     */
    public function plain(int $status = 200, array $headers = []): JsonResponse
    {
        return $this->makeJsonResponse(new \stdClass(), $status, $headers);
    }

    /**
     * @inheritDoc
     */
    public function withDefaultMessage(int $status = 200, array $headers = []): JsonResponse
    {
        if (!isset(FoundationResponse::$statusTexts[$status])) {
            throw new InvalidStatusCodeException($status);
        }

        return $this->withMessage(FoundationResponse::$statusTexts[$status], $status, $headers);
    }

    /**
     * @inheritDoc
     */
    public function withData($data, int $status = 200, array $headers = []): JsonResponse
    {
        return $this->makeJsonResponse($data, $status, $headers);
    }

    /**
     * @inheritDoc
     */
    public function withMessage(string $message, int $status = 200, array $headers = []): JsonResponse
    {
        return $this->makeJsonResponse(compact('message'), $status, $headers);
    }

    /**
     * Make JsonResponse instance
     *
     * @param mixed $data
     * @param int   $status
     * @param array $headers
     *
     * @return JsonResponse
     */
    private function makeJsonResponse($data = null, int $status = 200, array $headers = []): JsonResponse
    {
        return new JsonResponse($data, $status, $headers);
    }
}
