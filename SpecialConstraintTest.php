<?php

class SpecialConstraintConstraintTest extends PHPUnit_Framework_TestCase
{
    public function testPasswordsContainingOnlyNonSpecialCharactersAreWeak()
    {
        $constraint = new SpecialConstraint();
        $this->assertFalse($constraint->isStrong('123'));
        $this->assertFalse($constraint->isStrong('abc'));
    }

    public function testPasswordsContainingOnlySpecialCharactersAreStrong()
    {
        $constraint = new SpecialConstraint();
        $this->assertTrue($constraint->isStrong('%^&'));
        $this->assertTrue($constraint->isStrong('!@#'));
    }

    public function testPasswordsContainingAtLeastOneSpecialCharactersAreStrong()
    {
        $constraint = new SpecialConstraint();
        $this->assertTrue($constraint->isStrong('$123'));
        $this->assertTrue($constraint->isStrong('$abc'));
    }
}
