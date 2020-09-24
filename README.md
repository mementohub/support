# iMemento Support
[![Build Status](https://travis-ci.org/mementohub/support.svg?branch=master)](https://travis-ci.org/mementohub/support)
[![Latest Stable Version](https://poser.pugx.org/imemento/support/v/stable)](https://packagist.org/packages/imemento/support)
[![License](https://poser.pugx.org/imemento/support/license)](https://packagist.org/packages/imemento/support)
[![Total Downloads](https://poser.pugx.org/imemento/support/downloads)](https://packagist.org/packages/imemento/support)

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
