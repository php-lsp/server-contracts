<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server\Event;

use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Server\ConnectionInterface;

class FailureResponseSent extends ResponseSent
{
    /**
     * @param FailureResponseInterface<mixed, mixed> $response
     */
    public function __construct(
        FailureResponseInterface $response,
        ConnectionInterface $connection,
    ) {
        parent::__construct($response, $connection);
    }
}