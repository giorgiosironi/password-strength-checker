<?php

class AlphabeticConstraint
{
    public function isStrong($value)
    {
        return (bool) preg_match('/[A-Za-z]/', $value);
    }
}
