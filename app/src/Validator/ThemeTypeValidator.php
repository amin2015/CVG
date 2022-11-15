<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use App\Validator\ThemeType;
class ThemeTypeValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        dump($this->context->getObject()->getTheme()->getType());
//        /* @var ThemeType $constraint */
//
        if ('1' === $this->context->getObject()->getTheme()->getType() && null === $value || '' === $value) {
            $this->context->buildViolation($constraint->message)
//                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }


    }
}
