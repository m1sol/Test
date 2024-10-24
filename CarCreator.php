<?php

//namespace Cars;

class CarCreator
{
    private $data;
    private array $typeMap = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function createCar(): BaseCar
    {
        $data = $this->data;
        $params = explode('x', $data[4]);
        $width = floatval($params[0] ?? 0);
        $height = floatval($params[1] ?? 0);
        $length = floatval($params[2] ?? 0);

        switch ($data[0]) {
            case 'car': {
                $car = new Car();
                $car->setPassengerSeatsCount($data[2]);
            } break;
            case 'truck': {
                $car = new Truck();
                $car->setBodyWidth($width)
                    ->setBodyHeight($height)
                    ->setBodyLength($length)
                    ->SetBodyVolume();
            } break;
            case 'spec_machine': {
                $car = new SpecMachine();
                $car->setExtra($data[6]);
            } break;
            default:
                throw new \InvalidArgumentException("Unknown object type: $data[0]");
        }
        $car->setPhotoFileName($data[3]);
        $car->setBrand($data[1]);
        $car->setCarrying((float)$data[5]);
        return $car;
    }
}