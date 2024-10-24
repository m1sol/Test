<?php

//namespace Cars;

abstract class BaseCar
{
    private string $carType;
    private string $photoFileName;
    private string $brand;
    private float $carrying;
    private string $photoFileExt;

    public function __construct()
    {

    }

    public function getCarType(): string
    {
        return $this->carType;
    }

    public function setCarType(string $carType): self
    {
        $this->carType = $carType;
        return $this;
    }

    public function getPhotoFileName(): string
    {
        return $this->photoFileName;
    }

    public function setPhotoFileName(string $photoFileName): self
    {
        $this->photoFileName = $photoFileName;
        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;
        return $this;
    }

    public function getCarrying(): string
    {
        return $this->carrying;
    }

    public function setCarrying(float $carrying): self
    {
        $this->carrying = $carrying;
        return $this;
    }

    public function getPhotoFileExt(): string
    {
        $photoFileParts = explode(".", $this->photoFileName);
        $ext = (count($photoFileParts) > 1) ? $photoFileParts[count($photoFileParts) - 1] : "";
        return $ext;
    }
}