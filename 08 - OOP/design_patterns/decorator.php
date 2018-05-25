<?php

/**
 * Les décorateurs permettent d'ajouter des fonctionnalités à une classe, sans changer sa structure
 */

interface Car {
    function cost();
    function description();
}


class SUV implements Car {
    public function cost()
    {
        return 30000;
    }

    public function description()
    {
        return 'SUV';
    }
}

abstract class CarFeatureDecorator implements Car {
    protected $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    abstract function cost();
    abstract function description();
}

class SunRoofDecorator extends CarFeatureDecorator {
    public function cost()
    {
        return $this->car->cost() + 1500;
    }

    public function description()
    {
       return $this->car->description() . ", sunroof";
    }
}

class HighEndWheelsDecorator extends CarFeatureDecorator {
    public function cost()
    {
        return $this->car->cost() + 2000;
    }

    public function description()
    {
        return $this->car->description() . ", high end wheels";
    }
}

$suv = new SUV();
$carWithSunRoof = new SunRoofDecorator($suv);
$carWithSunRoofAndHighEndWheels = new HighEndWheelsDecorator($carWithSunRoof);

echo $carWithSunRoofAndHighEndWheels->description();
echo "<br>";
echo $carWithSunRoofAndHighEndWheels->cost();