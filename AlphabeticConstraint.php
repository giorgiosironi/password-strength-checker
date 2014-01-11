<?php

class AlphabeticConstraint extends AtLeastOneConstraint
{
    protected function characterClass()
    {
        return '[A-Za-z]';
    }
}
