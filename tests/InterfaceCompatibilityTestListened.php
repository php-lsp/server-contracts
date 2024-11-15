<?php

declare(strict_types=1);

namespace Lsp\Server\Tests;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Server\ClientInterface;
use Lsp\Server\ListenedServerInterface;
use Lsp\Server\ServerInterface;
use Lsp\Server\ServerInterface;
use PHPUnit\Framework\Attributes\Group;
use React\Promise\PromiseInterface;

/**
 * Note: Changing the behavior of these tests is allowed ONLY when updating
 *       a MAJOR version of the package.
 */
#[Group('php-lsp/server'), Group('unit')]
final class InterfaceCompatibilityTest extends TestCase
{
    public function testConnectionCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ClientInterface {
            public function getClientAddress(): string {}

            public function getServer(): ListenedServerInterface {}

            public function notify(NotificationInterface $notification): ?\Throwable {}

            public function call(RequestInterface $request): PromiseInterface {}

            public function close(): void {}
        };
    }

    public function testDriverCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ServerInterface {
            public function listen(string $dsn): ListenedServerInterface {}

            public function run(): void {}

            public function stop(): void {}
        };
    }

    public function testRunnableCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ServerInterface {
            public function run(): void {}

            public function stop(): void {}
        };
    }

    public function testServerCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ListenedServerInterface {
            public function getDriver(): ServerInterface {}

            public function getDataSourceName(): string {}
        };
    }
}
