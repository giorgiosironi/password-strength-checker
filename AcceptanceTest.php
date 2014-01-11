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
            ['123donald'],
            ['123DONALD'],
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
            ['donald1'],
            ['donaldduck'],
            ['12345678'],
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
