<?php

class PasswordStrengthChecker implements Constraint
{
    private $constraints;

    public function __construct($constraints)
    {
        $this->constraints = $constraints;
    }

    public function isStrong($value)
    {
        foreach ($this->constraints as $constraint) {
            if (!$constraint->isStrong($value)) {
                return false;
            }
        }
        return true;
    }
}
