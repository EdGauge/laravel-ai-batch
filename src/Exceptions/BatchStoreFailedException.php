<?php

namespace AiBatch\Exceptions;

use AiBatch\BatchHandle;
use Throwable;

/**
 * The provider accepted the batch, but its request context could not be stored.
 *
 * The batch is live and billed: the handle is kept so the caller can record its id or cancel it.
 */
class BatchStoreFailedException extends BatchException
{
    public function __construct(public readonly BatchHandle $handle, Throwable $previous)
    {
        parent::__construct(sprintf(
            'Batch [%s] was submitted to [%s] but its request context could not be stored: %s',
            $handle->id,
            $handle->provider->name(),
            $previous->getMessage(),
        ), 0, $previous);
    }
}
