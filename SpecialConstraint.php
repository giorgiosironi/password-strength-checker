<?php

class SpecialConstraint extends AtLeastOneConstraint
{
    protected function characterClass()
    {
        return '[^A-Za-z0-9]';
    }
}
