<?php

/**
 * @package ThemePlate
 */

namespace CardanoPHP\Network;

use CardanoPHP\Utilities\Network;

class Mainnet extends Network
{
	public function id(): int
	{
		return 1;
	}
}
