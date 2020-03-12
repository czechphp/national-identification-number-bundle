# NationalIdentificationNumber

> Czech: Rodné číslo

Validates that a value is valid national identification number string.

## Basic usage

```php
<?php

// src/Entity/User.php
namespace App\Entity;

use Czechphp\NationalIdentificationNumberBundle\Validator\Constraints as CzechphpAssert;

class User
{
    /**
     * @CzechphpAssert\NationalIdentificationNumber(
     *     message="The value '{{ value }}' is not valid national identification number."
     * )
     */
    private $nationalIdentificationNumber;
}
```
## Options

### message

**type**: `string` **default**: `This is not valid national identification number.`

This message is shown if the underlying data is not a valid bank account number.

You can use the following parameters in this message:
* `{{ value }}` The current (invalid) value
