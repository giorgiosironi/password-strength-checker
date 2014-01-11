<?php

abstract class AtLeastOneConstraint implements Constraint
{
    public function isStrong($value)
    {
        $regexp = '/' . $this->characterClass() . '{1}/';
        return (bool) preg_match($regexp, $value);
    }

    protected abstract function characterClass();
}
