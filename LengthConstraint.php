<?php

class LengthConstraint implements Constraint
{
    public function isStrong($value)
    {
        return false;
    }
}
