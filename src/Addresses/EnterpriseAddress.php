<?php

/**
 * @package ThemePlate
 */

namespace CardanoPHP\Addresses;

use CardanoPHP\Utilities\Credential;
use CardanoPHP\Utilities\HashType;
use CardanoPHP\Utilities\Network;

class EnterpriseAddress extends AbstractAddress {
	protected $paymentCredential;

	public const DATA = 'addr';

	public function __construct(Network $network, Credential $paymentCredential) {
		$this->paymentCredential = $paymentCredential;

		parent::__construct($network);
		$this->computeHex($paymentCredential->hash);
	}

	protected function maskPayload(): int
	{
		$payload = 96;

		if ($this->paymentCredential->type === HashType::Script) {
			$mask = 1 << 4;
			$payload |= $mask;
		}

		return $payload;
	}
}
