<?php

declare(strict_types=1);

namespace Ilyatos\ApiResponse\Exceptions;

use Throwable;

final class InvalidStatusCodeException extends \InvalidArgumentException
{
    /**
     * Default exception message
     *
     * @var string
     */
    private const EXCEPTION_PATTERN = 'Got undefined status code: %d';

    public function __construct(int $invalidCode, $code = 0, Throwable $previous = null)
    {
        parent::__construct(sprintf(self::EXCEPTION_PATTERN, $invalidCode), $code, $previous);
    }
}
