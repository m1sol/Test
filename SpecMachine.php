<?php

//namespace Cars;

class SpecMachine extends Car
{
    private string $extra;

    public function __construct()
    {
        $this->setCarType('SpecMachine');
    }

    public function getExtra(): string
    {
        return $this->extra;
    }

    public function setExtra(string $extra): self
    {
        $this->extra = $extra;
        return $this;
    }
}