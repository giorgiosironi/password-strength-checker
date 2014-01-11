<?php

class AcceptanceTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->checker = new PasswordStrengthChecker([
            new LengthConstraint(7),
            new AlphabeticConstraint(),
            new DigitConstraint()
        ]);
    }

    public static function strongPasswords()
    {
        return [
            ['donald123'],
        ];
    }

    /**
     * @dataProvider strongPasswords
     */
    public function testStrongPasswords($password)
    {
        $this->assertTrue($this->checker->isStrong($password));
    }
}
