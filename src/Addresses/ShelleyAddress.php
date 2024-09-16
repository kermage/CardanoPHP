<?php

/**
 * @package ThemePlate
 */

namespace CardanoPHP\Addresses;

use CardanoPHP\HashType\Script;
use CardanoPHP\Utilities\Credential;
use CardanoPHP\Utilities\Network;

class ShelleyAddress extends AbstractAddress
{
    protected Credential $paymentCredential;
    protected Credential $stakeCredential;

    public const DATA = 'addr';

    public function __construct(Network $network, Credential $paymentCredential, Credential $stakeCredential)
    {
        $this->paymentCredential = $paymentCredential;
        $this->stakeCredential   = $stakeCredential;

        parent::__construct($network);
        $this->computeHex($paymentCredential->getHash() . $stakeCredential->getHash());
    }

    protected function maskPayload(): int
    {
        $payload = 0;

        if ($this->paymentCredential->getType() instanceof Script) {
            $mask     = 1 << 4;
            $payload |= $mask;
        }

        if ($this->stakeCredential->getType() instanceof Script) {
            $mask     = 1 << 5;
            $payload |= $mask;
        }

        return $payload;
    }
}
