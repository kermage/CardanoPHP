<?php

/**
 * @package ThemePlate
 */

namespace CardanoPHP\Addresses;

use CardanoPHP\Utilities\Network;

use function BitWasp\Bech32\convertBits;
use function BitWasp\Bech32\encode;

abstract class AbstractAddress {
    private string $addressHex = "";
    private string $addressBytes = "";
    private string $addressBech32 = "";
    protected Network $network;

    public const DATA = '';

    public function __construct(Network $network) {
        $this->network = $network;
    }

    protected function computeBech32($addressBytes): string {
        $unpack = unpack("C*", $addressBytes);
        $words = convertBits(array_values($unpack), count($unpack), 8, 5);
        $data = static::DATA . (0 === $this->network->id() ? '_test' : '');

        return encode($data, $words);
    }

    abstract protected function maskPayload(): int;

    protected function computeHex($hash): void {
        $payload = $this->maskPayload() | $this->network->id();
        $address = sprintf("%02x", $payload) . $hash;

        $this->addressHex = $address;
        $this->addressBytes = hex2bin($address);
        $this->addressBech32 = $this->computeBech32($this->addressBytes);
    }

    public function getHex(): string {
        return $this->addressHex;
    }

    public function getBytes(): string {
        return $this->addressBytes;
    }

    public function getBech32(): string {
        return $this->addressBech32;
    }
}
