<?php

class AdminAcceptanceTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->checker = new PasswordStrengthChecker([
            new LengthConstraint(10),
            new AlphabeticConstraint(),
            new DigitConstraint(),
            new SpecialConstraint(),
        ]);
    }

    public static function strongPasswords()
    {
        return [
            ['donald^duck123'],
            ['123donald%duck'],
            ['123DONALDDUCK%'],
        ];
    }

    /**
     * @dataProvider strongPasswords
     */
    public function testStrongPasswords($password)
    {
        $this->assertTrue($this->checker->isStrong($password));
    }

    public static function weakPasswords()
    {
        return [
            ['donaldduck'],
            ['donaldduckandmickeymouse'],
            ['donaldduckandmickeymouse1'],
            ['donaldduckandmickeymouse$'],
            ['12345678901234567890'],
        ];
    }

    /**
     * @dataProvider weakPasswords
     */
    public function testWeakPasswords($password)
    {
        $this->assertFalse($this->checker->isStrong($password));
    }
}
