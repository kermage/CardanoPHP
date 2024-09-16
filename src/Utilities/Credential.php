<?php

/**
 * @package ThemePlate
 */

namespace CardanoPHP\Utilities;

class Credential {
	public function __construct(
		public HashType $type,
		public string $hash
	) {}
}
