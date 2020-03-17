<?php

namespace Ilyatos\ApiResponse\Contracts;

use Illuminate\Http\JsonResponse;

interface Response
{
    /**
     * Make simple response without additional data
     *
     * @param int   $status
     * @param array $headers
     *
     * @return JsonResponse
     */
    public function plain(int $status = 200, array $headers = []): JsonResponse;

    /**
     * Make response using response {@see \Symfony\Component\HttpFoundation\Response} code default message
     *
     * @param int   $status
     * @param array $headers
     *
     * @return JsonResponse
     */
    public function withDefaultMessage(int $status = 200, array $headers = []): JsonResponse;

    /**
     * Make response with data
     *
     * @param mixed $data
     * @param int   $status
     * @param array $headers
     *
     * @return JsonResponse
     */
    public function withData($data, int $status = 200, array $headers = []): JsonResponse;

    /**
     * Make response with user message
     *
     * @param string $message
     * @param int    $status
     * @param array  $headers
     *
     * @return JsonResponse
     */
    public function withMessage(string $message, int $status = 200, array $headers = []): JsonResponse;
}
