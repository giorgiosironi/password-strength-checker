<?php

class LengthConstraintTest extends PHPUnit_Framework_TestCase
{
    public function testShorterOrEqualPasswordsAreWeak()
    {
        $constraint = new LengthConstraint(7);
        $this->assertFalse($constraint->isStrong('donald'));
        $this->assertFalse($constraint->isStrong('mickeym'));
    }
}
