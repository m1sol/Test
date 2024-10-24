<?php

//namespace Cars;

class Car extends BaseCar
{
    private int $passengerSeatsCount;

    public function __construct()
    {
        $this->setCarType('Car');
    }

    public function getPassengerSeatsCount(): int
    {
        return $this->passengerSeatsCount;
    }

    public function setPassengerSeatsCount(int $passengerSeatsCount): self
    {
        $this->passengerSeatsCount = $passengerSeatsCount;
        return $this;
    }
}