<?php
spl_autoload_register(function ($class) {
    include $class . '.php';
});

function getCarList(string $fileName): array {
    $cars = [];
    try {
        $file = fopen($fileName, 'r');
        if (!$file) {
            throw new \Exception("Неудалось открыть файл.\n");
        }
        fgetcsv($file);
        while (($line = fgetcsv($file, 0, ";")) !== false) {
            try {
                if (count($line) < 6) {
                    continue;
                }
                $carCreator = new CarCreator($line);
                $car = $carCreator->createCar();
                $cars[] = $car;
            } catch (\Throwable $e) {
                continue; // Пропуск некорректной строки
            }
        }
        fclose($file);
    } catch (\Exception $e) {
        throw new \Exception($e->getMessage());
    }
    return $cars;
}

$cars = getCarList('public/cars.csv');
?>
<table>
    <tr>
        <th>Тип</th>
        <th>Марка</th>
        <th>Кол-во пассажирских мест</th>
        <th>Фото</th>
        <th>Кузов Длина, м</th>
        <th>Кузов Ширина, м</th>
        <th>Кузов Высота, м</th>
        <th>Кузов Объем, м</th>
        <th>Грузоподъемность</th>
        <th>Дополнительно</th>
    </tr>
<?php foreach ($cars as $car):?>
    <tr>
        <td><?php echo $car->getCarType();?></td>
        <td><?php echo $car->getBrand();?></td>
        <td><?php if ($car->getCarType() == 'Car') {
                echo $car->getPassengerSeatsCount();
            }?>
        </td>
        <td><?php echo $car->getPhotoFileName() . ' (' . $car->getPhotoFileExt() . ')';?></td>
        <td><?php if ($car->getCarType() == 'Truck') {
                echo $car->getBodyLength();
            }?>
        </td>
        <td><?php if ($car->getCarType() == 'Truck') {
                echo $car->getBodyWidth();
            }?>
        </td>
        <td><?php if ($car->getCarType() == 'Truck') {
                echo $car->getBodyHeight();
            }?>
        </td>
        <td><?php if ($car->getCarType() == 'Truck') {
                echo $car->getBodyVolume();
            }?>
        </td>
        <td><?php echo $car->getCarrying();?></td>
        <td><?php if ($car->getCarType() == 'SpecMachine') {
                echo $car->getExtra();
            }?>
        </td>
    </tr>
<?php endforeach;?>
</table>