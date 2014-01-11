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

    public function testIfJustOneConstraintFailsThePasswordIsNotStrong()
    {
        $passes = $this->getMock('Constraint');
        $passes->expects($this->any())
            ->method('isStrong')
            ->will($this->returnValue(true));

        $fails = $this->getMock('Constraint');
        $fails->expects($this->any())
            ->method('isStrong')
            ->will($this->returnValue(false));
        $checker = new PasswordStrengthChecker([$passes, $fails]);

        $this->assertFalse($checker->isStrong('donald'));
    }
}
