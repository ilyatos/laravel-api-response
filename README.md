# Laravel API Response

Welcome to simple wrapper of JsonResponse!

## Requirements

- Laravel 5/6/7

_You don't need to register the service provider manually._

## Usage example

All you need to do is inject the `\Ilyatos\ApiResponse\Contracts\Response` interface into your controller/middleware/etc. constructor.\
Just look at this nice example and everything will be clear for you:
```php
<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Ilyatos\ApiResponse\Contracts\Response;

class Controller extends BaseController
{
    /**
     * @var Response
     */
    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function example(): JsonResponse
    {
        return $this->response->withMessage('hello!');
    }

    public function anotherExample(): JsonResponse
    {
        return $this->response->withDefaultMessage(\Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND);
    }

    public function yetAnotherExample(): JsonResponse
    {
        return $this->response->withData(['status' => 'nice']);
    }
}
```
