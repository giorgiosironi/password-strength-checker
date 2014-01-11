<?php

class PasswordStrengthCheckerTest extends PHPUnit_Framework_TestCase
{
    public function testIfThereAreNoConstraintsThePasswordIsAlwaysStrong()
    {
        $checker = new PasswordStrengthChecker([]);
        $this->assertTrue($checker->isStrong('donald'));
    }

    public function testIfASingleConstraintFailsThePasswordIsNotStrong()
    {
        $constraint = $this->getMock('Constraint');
        $constraint->expects($this->any())
            ->method('isStrong')
            ->will($this->returnValue(false));
        $checker = new PasswordStrengthChecker([$constraint]);
        $this->assertFalse($checker->isStrong('donald'));
    }

    // test if only second constraint fails
}

interface Constraint
{
    public function isStrong($value);
}

class PasswordStrengthChecker implements Constraint
{
    private $constraints;

    public function __construct($constraints)
    {
        $this->constraints = $constraints;
    }

    public function isStrong($value)
    {
        foreach ($this->constraints as $constraint) {
            if (!$constraint->isStrong($value)) {
                return false;
            }
        }
        return true;
    }
}
