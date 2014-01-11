<?php

class SpecialConstraint implements Constraint
{
    public function isStrong($value)
    {
        return (bool) preg_match('/[^A-Za-z0-9]/', $value);
    }
}
