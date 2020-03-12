<?php

declare(strict_types = 1);

namespace Czechphp\NationalIdentificationNumberBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 *
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
final class NationalIdentificationNumber extends Constraint
{
    public const FORMAT_ERROR = '53451acc-faec-4b76-a911-ce90e88b3e42';
    public const MONTH_ERROR = 'e10db930-cd8f-4c1d-aca7-d5d8312234b2';
    public const DAY_ERROR = 'aec87b64-d46b-44e6-838a-c4a047abb539';
    public const SEQUENCE_ERROR = '5b7236fc-73d3-44d2-9dc1-b4a9b19eb171';
    public const MODULO_ERROR = 'f489edc9-3fb5-4318-9029-35d356478876';

    protected static $errorNames = [
        self::FORMAT_ERROR => 'FORMAT_ERROR',
        self::MONTH_ERROR => 'MONTH_ERROR',
        self::DAY_ERROR => 'DAY_ERROR',
        self::SEQUENCE_ERROR => 'SEQUENCE_ERROR',
        self::MODULO_ERROR => 'MODULO_ERROR',
    ];

    public $message = 'This is not valid national identification number.';
}
