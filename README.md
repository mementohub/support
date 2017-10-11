# iMemento Support

Support helpers for common internal operations (eg. identity encode/decode).

## Install
```bash
composer require imemento/support
```

## Usage
```php
use iMemento\Support\Identity;
```

### Encoding
```php
Identity::encode([1, 2]);
identity_encode([1, 2]);
```

### Decoding
```php
Identity::decode(['1.2']);
identity_decode(['1.2']);
```
