<?php

class AlphabeticConstraintTest extends PHPUnit_Framework_TestCase
{
    public function testPasswordsContainingOnlyNonAlphabeticCharactersAreWeak()
    {
        $constraint = new AlphabeticConstraint();
        $this->assertFalse($constraint->isStrong('123'));
        $this->assertFalse($constraint->isStrong('%^&'));
    }

    public function testPasswordsContainingOnlyAlphabeticCharactersAreStrong()
    {
        $constraint = new AlphabeticConstraint();
        $this->assertTrue($constraint->isStrong('abc'));
        $this->assertTrue($constraint->isStrong('ABC'));
    }

    public function testPasswordsContainingAtLeastOneAlphabeticCharactersAreStrong()
    {
        $constraint = new AlphabeticConstraint();
        $this->assertTrue($constraint->isStrong('a123'));
        $this->assertTrue($constraint->isStrong('a%^&'));
    }
}
