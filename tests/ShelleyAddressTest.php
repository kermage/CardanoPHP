<?php

/**
 * @package ThemePlate
 */

namespace Tests;

use CardanoPHP\Addresses\ShelleyAddress;
use CardanoPHP\HashType\Address;
use CardanoPHP\Network\Testnet;
use CardanoPHP\Utilities\Credential;
use PHPUnit\Framework\TestCase;

class ShelleyAddressTest extends TestCase
{
	public function testAddress()
	{
		$address = new ShelleyAddress(
			new Testnet(),
			new Credential(
				new Address(),
				'839f2b84c766291d7ae24649529a73b05f32acf4b76f71e0ac6ffaa5'
			),
			new Credential(
				new Address(),
				'ce77e7c1ae5caa5c8b525d8d457e5635b84969d48785b1072a10b910'
			),
		);

		$this->assertSame('00839f2b84c766291d7ae24649529a73b05f32acf4b76f71e0ac6ffaa5ce77e7c1ae5caa5c8b525d8d457e5635b84969d48785b1072a10b910', $address->getHex());
		$this->assertSame('addr_test1qzpe72uycanzj8t6ufryj556wwc97v4v7jmk7u0q43hl4fwwwlnurtju4fwgk5ja34zhu434hpykn4y8skcsw2sshygqwfe2qk', $address->getBech32());
	}
}
