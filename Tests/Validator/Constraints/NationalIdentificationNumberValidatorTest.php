<?php

declare(strict_types = 1);

namespace Czechphp\NationalIdentificationNumberBundle\Tests\Validator\Constraints;

use Czechphp\NationalIdentificationNumberBundle\Validator\Constraints\NationalIdentificationNumber;
use Czechphp\NationalIdentificationNumberBundle\Validator\Constraints\NationalIdentificationNumberValidator;
use Czechphp\NationalIdentificationNumberValidator\NationalIdentificationNumberValidator as BaseValidator;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

class NationalIdentificationNumberValidatorTest extends ConstraintValidatorTestCase
{
    /**
     * @var MockObject|BaseValidator
     */
    private $baseValidator;

    protected function createValidator()
    {
        $this->baseValidator = $this->createMock(BaseValidator::class);

        return new NationalIdentificationNumberValidator($this->baseValidator);
    }

    public function testNull()
    {
        $this->baseValidator->expects($this->never())->method('validate');

        $this->validator->validate(null, new NationalIdentificationNumber());

        $this->assertNoViolation();
    }

    public function testEmpty()
    {
        $this->baseValidator->expects($this->never())->method('validate');

        $this->validator->validate('', new NationalIdentificationNumber());

        $this->assertNoViolation();
    }

    public function testInteger()
    {
        $this->baseValidator->expects($this->never())->method('validate');

        $this->expectException(UnexpectedTypeException::class);

        $this->validator->validate(1, new NationalIdentificationNumber());
    }

    public function testFloat()
    {
        $this->baseValidator->expects($this->never())->method('validate');

        $this->expectException(UnexpectedTypeException::class);

        $this->validator->validate(1.0, new NationalIdentificationNumber());
    }

    public function testArray()
    {
        $this->baseValidator->expects($this->never())->method('validate');

        $this->expectException(UnexpectedTypeException::class);

        $this->validator->validate([], new NationalIdentificationNumber());
    }

    public function testObject()
    {
        $this->baseValidator->expects($this->never())->method('validate');

        $this->expectException(UnexpectedTypeException::class);

        $this->validator->validate((object) [], new NationalIdentificationNumber());
    }

    public function testToStringObject()
    {
        $this->baseValidator->expects($this->once())->method('validate')->willReturn(BaseValidator::ERROR_NONE);

        $this->validator->validate(new ToStringObject('valid_number'), new NationalIdentificationNumber());

        $this->assertNoViolation();
    }

    public function testInvalidConstraint()
    {
        $this->baseValidator->expects($this->never())->method('validate');

        $this->expectException(UnexpectedTypeException::class);

        /** @var MockObject|Constraint $constraint */
        $constraint = $this->createMock(Constraint::class);

        $this->validator->validate('valid_number', $constraint);
    }

    public function testValid()
    {
        $this->baseValidator->expects($this->once())->method('validate')->willReturn(BaseValidator::ERROR_NONE);

        $this->validator->validate('valid_number', new NationalIdentificationNumber());

        $this->assertNoViolation();
    }

    public function testFormat()
    {
        $this->baseValidator->expects($this->once())->method('validate')->willReturn(BaseValidator::ERROR_FORMAT);

        $value = 'invalid_format';
        $constraint = new NationalIdentificationNumber();

        $this->validator->validate($value, $constraint);

        $builder = $this->buildViolation($constraint->message);
        $builder->setParameter('{{ value }}', $value);
        $builder->setCode(NationalIdentificationNumber::FORMAT_ERROR);
        $builder->assertRaised();
    }
}
