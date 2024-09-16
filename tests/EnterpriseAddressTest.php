<?php

/**
 * @package ThemePlate
 */

namespace Tests;

use CardanoPHP\Addresses\EnterpriseAddress;
use CardanoPHP\HashType\Address;
use CardanoPHP\Network\Mainnet;
use CardanoPHP\Utilities\Credential;
use PHPUnit\Framework\TestCase;

class EnterpriseAddressTest extends TestCase
{
    public function testAddress()
    {
        $address = new EnterpriseAddress(
            new Mainnet(),
            new Credential(
                new Address(),
                '7863b5c43bdf0a06608abc82f0573a549714ff69166074dcdde393d8'
            )
        );

        $this->assertSame('617863b5c43bdf0a06608abc82f0573a549714ff69166074dcdde393d8', $address->getHex());
        $this->assertSame('addr1v9ux8dwy800s5pnq327g9uzh8f2fw98ldytxqaxumh3e8kqumfr6d', $address->getBech32());
    }
}
