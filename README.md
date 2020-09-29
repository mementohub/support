# iMemento Support
[![Build Status](https://github.com/mementohub/support/workflows/Testing/badge.svg)](https://github.com/mementohub/support/actions)
[![Latest Stable Version](https://img.shields.io/packagist/v/imemento/support)](https://packagist.org/packages/imemento/support)
[![License](https://img.shields.io/packagist/l/imemento/support)](https://packagist.org/packages/imemento/support)
[![Total Downloads](https://img.shields.io/packagist/dt/imemento/support)](https://packagist.org/packages/imemento/support)

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
