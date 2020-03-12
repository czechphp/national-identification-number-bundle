# Czech Bank Account Symfony integration

[![Build Status](https://travis-ci.com/czechphp/national-identification-number-bundle.svg?branch=master)](https://travis-ci.com/czechphp/national-identification-number-bundle)
[![codecov](https://codecov.io/gh/czechphp/national-identification-number-bundle/branch/master/graph/badge.svg)](https://codecov.io/gh/czechphp/czechphp/national-identification-number-bundle)

Symfony integration of [czechphp/national-identification-number-validator](https://github.com/czechphp/national-identification-number-validator) library.

## Installation

### Applications that use Symfony Flex

Open a command console, enter your project directory and execute:

```console
$ composer require czechphp/national-identification-number-bundle
```

### Applications that don't use Symfony Flex

#### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require czechphp/national-identification-number-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

#### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    Czechphp\NationalIdentificationNumberBundle\NationalIdentificationNumberBundle::class => ['all' => true],
];
```

## Documentation

* [Constraints](Resources/doc/constraints.md)
* Underlying library [czechphp/national-identification-number-validator](https://github.com/czechphp/national-identification-number-validator)
