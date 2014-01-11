<?php

class DigitConstraint implements Constraint
{
    public function isStrong($value)
    {
        return (bool) preg_match('/[0-9]/', $value);
    }
}
