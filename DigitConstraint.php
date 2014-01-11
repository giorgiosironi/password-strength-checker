<?php

class DigitConstraint extends AtLeastOneConstraint
{
    protected function characterClass()
    {
        return '[0-9]';
    }
}
