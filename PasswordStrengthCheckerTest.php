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
        $this->markTestIncomplete();
        $constraint = $this->getMock('Constraint');
        $constraint->expects($this->any())
            ->method('isStrong')
            ->will($this->returnValue(false));
    }
    // test if only second constraint fails
}

class PasswordStrengthChecker
{
    public function isStrong()
    {
        return true;
    }
}
