# CardanoPHP

Created mainly for verifying datasignature from CIP30 wallets

## Usage

```php
use CardanoPHP\Verifier;

Verifier::verify($signature, $key, $message, $address);
```

Translated from <https://github.com/cardano-foundation/cardano-verify-datasignature>

Used by [CardanoPress](https://github.com/CardanoPress/cardanopress)
