<?php

namespace Ilyatos\ApiResponse;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Ilyatos\ApiResponse\Contracts\Response;

final class ServiceProvider extends BaseServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $this->app->bind(Response::class, ApiResponse::class);
    }
}
