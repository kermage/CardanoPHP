<?php

/**
 * @package ThemePlate
 */

namespace Tests;

use CardanoPHP\Addresses\AbstractAddress;
use CardanoPHP\Network\Mainnet;
use PHPUnit\Framework\TestCase;

class AbstractAddressTest extends TestCase
{
    /** @return array<int, array<int, string>> */
    public function forTestInvalidHash(): array
    {
        return [
            [
                'non_hex_string',
                'must be hexadecimal string',
            ],
            [
                '74657374696E672',
                'must have an even length',
            ],
        ];
    }

    /**
     * @dataProvider forTestInvalidHash
     */
    public function testInvalidHash(string $hash, string $message): void
    {
        $this->expectExceptionMessage($message);

        new class ($hash) extends AbstractAddress {
            public function __construct(string $hash)
            {
                parent::__construct(new Mainnet());
                $this->computeHex($hash);
            }

            protected function maskPayload(): int
            {
                return 0;
            }
        };
    }
}
