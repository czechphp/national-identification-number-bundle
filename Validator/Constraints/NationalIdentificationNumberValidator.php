<?php

declare(strict_types = 1);

namespace Czechphp\NationalIdentificationNumberBundle\Validator\Constraints;

use Czechphp\NationalIdentificationNumberValidator\NationalIdentificationNumberValidator as BaseValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

final class NationalIdentificationNumberValidator extends ConstraintValidator
{
    /**
     * @var BaseValidator
     */
    private $validator;

    public function __construct(BaseValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @inheritDoc
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof NationalIdentificationNumber) {
            throw new UnexpectedTypeException($constraint, NationalIdentificationNumber::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value) && !(is_object($value) && method_exists($value, '__toString'))) {
            throw new UnexpectedTypeException($value, 'string');
        }

        $value = (string) $value;

        switch ($this->validator->validate($value)) {
            case BaseValidator::ERROR_FORMAT:
                $builder = $this->context->buildViolation($constraint->message);
                $builder->setParameter('{{ value }}', $value);
                $builder->setCode(NationalIdentificationNumber::FORMAT_ERROR);
                $builder->addViolation();

                return;
            case BaseValidator::ERROR_MONTH:
                $builder = $this->context->buildViolation($constraint->message);
                $builder->setParameter('{{ value }}', $value);
                $builder->setCode(NationalIdentificationNumber::MONTH_ERROR);
                $builder->addViolation();

                return;
            case BaseValidator::ERROR_DAY:
                $builder = $this->context->buildViolation($constraint->message);
                $builder->setParameter('{{ value }}', $value);
                $builder->setCode(NationalIdentificationNumber::DAY_ERROR);
                $builder->addViolation();

                return;
            case BaseValidator::ERROR_SEQUENCE:
                $builder = $this->context->buildViolation($constraint->message);
                $builder->setParameter('{{ value }}', $value);
                $builder->setCode(NationalIdentificationNumber::SEQUENCE_ERROR);
                $builder->addViolation();

                return;
            case BaseValidator::ERROR_MODULO:
                $builder = $this->context->buildViolation($constraint->message);
                $builder->setParameter('{{ value }}', $value);
                $builder->setCode(NationalIdentificationNumber::MODULO_ERROR);
                $builder->addViolation();

                return;
            case BaseValidator::ERROR_NONE:
                return;
        }
    }
}
