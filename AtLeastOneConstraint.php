<?php

abstract class AtLeastOneConstraint implements Constraint
{
    public function isStrong($value)
    {
        $regexp = '/' . $this->characterClass() . '/';
        return (bool) preg_match($regexp, $value);
    }

    protected abstract function characterClass();
}
