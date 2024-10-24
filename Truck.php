<?php

//namespace Cars;

class Truck extends Car
{
    private float $bodyWidth;
    private float $bodyLength;
    private float $bodyHeight;
    private float $bodyVolume;

    public function __construct()
    {
        $this->setCarType('Truck');
    }
    public function getBodyWidth(): float
    {
        return $this->bodyWidth;
    }
    public function SetBodyWidth(float $bodyWidth): self
    {
        $this->bodyWidth = $bodyWidth;
        return $this;
    }

    public function getBodyLength(): float
    {
        return $this->bodyLength;
    }

    public function SetBodyLength(float $bodyLength): self
    {
        $this->bodyLength = $bodyLength;
        return $this;
    }

    public function getBodyHeight(): float
    {
        return $this->bodyHeight;
    }

    public function SetBodyHeight(float $bodyHeight): self
    {
        $this->bodyHeight = $bodyHeight;
        return $this;
    }

    public function getBodyVolume(): float
    {
        return $this->bodyVolume;
    }
    public function SetBodyVolume(): self
    {
        $this->bodyVolume = $this->bodyWidth * $this->bodyLength * $this->bodyHeight;
        return $this;
    }
}