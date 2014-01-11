<?php

class LengthConstraint implements Constraint
{
    private $maximumWeakLength;
    
    public function __construct($maximumWeakLength)
    {
        $this->maximumWeakLength = $maximumWeakLength;
    }

    public function isStrong($value)
    {
        return strlen($value) > $this->maximumWeakLength;
    }
}
