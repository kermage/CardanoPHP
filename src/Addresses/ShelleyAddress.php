<?php

/**
 * @package ThemePlate
 */

namespace CardanoPHP\Addresses;

use CardanoPHP\Utilities\Credential;
use CardanoPHP\Utilities\HashType;
use CardanoPHP\Utilities\Network;

class ShelleyAddress extends AbstractAddress {
	protected Credential $paymentCredential;
	protected Credential $stakeCredential;

	public const DATA = 'addr';

	public function __construct(Network $network, Credential $paymentCredential, Credential $stakeCredential) {
		$this->paymentCredential = $paymentCredential;
		$this->stakeCredential = $stakeCredential;

		parent::__construct($network);
		$this->computeHex($paymentCredential->hash . $stakeCredential->hash);
	}

	protected function maskPayload(): int
	{
		$payload = 0;

		if ($this->paymentCredential->type === HashType::Script) {
			$mask = 1 << 4;
			$payload |= $mask;
		}

		if ($this->stakeCredential->type === HashType::Script) {
			$mask = 1 << 5;
			$payload |= $mask;
		}

		return $payload;
	}
}
