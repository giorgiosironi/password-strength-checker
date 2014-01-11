<?php

class AlphabeticConstraint implements Constraint
{
    public function isStrong($value)
    {
        return (bool) preg_match('/[A-Za-z]/', $value);
    }
}
