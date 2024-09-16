<?php

/**
 * @package ThemePlate
 */

namespace CardanoPHP\Addresses;

use CardanoPHP\HashType\Script;
use CardanoPHP\Utilities\Credential;
use CardanoPHP\Utilities\Network;

class RewardAddress extends AbstractAddress
{
    protected Credential $stakeCredential;

    public const DATA = 'stake';

    public function __construct(Network $network, Credential $stakeCredential)
    {
        $this->stakeCredential = $stakeCredential;

        parent::__construct($network);
        $this->computeHex($stakeCredential->getHash());
    }

    protected function maskPayload(): int
    {
        $payload = 224;

        if ($this->stakeCredential->getType() instanceof Script) {
            $mask     = 1 << 4;
            $payload |= $mask;
        }

        return $payload;
    }
}
