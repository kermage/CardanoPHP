<?php

/**
 * @package ThemePlate
 */

namespace CardanoPHP\Network;

use CardanoPHP\Utilities\Network;

class Testnet extends Network
{
    public function id(): int
    {
        return 0;
    }
}
