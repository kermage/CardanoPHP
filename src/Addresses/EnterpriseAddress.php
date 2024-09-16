<?php

/**
 * @package ThemePlate
 */

namespace CardanoPHP\Addresses;

use CardanoPHP\HashType\Script;
use CardanoPHP\Utilities\Credential;
use CardanoPHP\Utilities\Network;

class EnterpriseAddress extends AbstractAddress {
	protected Credential $paymentCredential;

	public const DATA = 'addr';

	public function __construct(Network $network, Credential $paymentCredential) {
		$this->paymentCredential = $paymentCredential;

		parent::__construct($network);
		$this->computeHex($paymentCredential->getHash());
	}

	protected function maskPayload(): int
	{
		$payload = 96;

		if ($this->paymentCredential->getType() instanceof Script) {
			$mask = 1 << 4;
			$payload |= $mask;
		}

		return $payload;
	}
}
