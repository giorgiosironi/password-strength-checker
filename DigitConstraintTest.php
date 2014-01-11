<?php

class DigitConstraintTest extends PHPUnit_Framework_TestCase
{
    public function testPasswordsContainingOnlyNonDigitCharactersAreWeak()
    {
        $constraint = new DigitConstraint();
        $this->assertFalse($constraint->isStrong('abc'));
        $this->assertFalse($constraint->isStrong('%^&'));
    }

    public function testPasswordsContainingOnlyDigitCharactersAreStrong()
    {
        $constraint = new DigitConstraint();
        $this->assertTrue($constraint->isStrong('123'));
    }

    public function testPasswordsContainingAtLeastOneDigitCharacterAreStrong()
    {
        $constraint = new DigitConstraint();
        $this->assertTrue($constraint->isStrong('1abc'));
        $this->assertTrue($constraint->isStrong('4%^&'));
    }
}
