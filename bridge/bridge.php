<?php

// Implementor interface
interface DrawingAPI {
    public function drawCircle($x, $y, $radius);
}

// Concrete Implementor 1
class DrawingAPI1 implements DrawingAPI {
    public function drawCircle($x, $y, $radius) {
        echo "API1.circle at $x:$y radius $radius\n";
    }
}

// Concrete Implementor 2
class DrawingAPI2 implements DrawingAPI {
    public function drawCircle($x, $y, $radius) {
        echo "API2.circle at $x:$y radius $radius\n";
    }
}

// Abstraction
abstract class Shape {
    protected $drawingAPI;

    public function __construct(DrawingAPI $drawingAPI) {
        $this->drawingAPI = $drawingAPI;
    }

    public abstract function draw();
    public abstract function resizeByPercentage($pct);
}

// Refined Abstraction
class CircleShape extends Shape {
    private $x, $y, $radius;

    public function __construct($x, $y, $radius, DrawingAPI $drawingAPI) {
        parent::__construct($drawingAPI);
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function draw() {
        $this->drawingAPI->drawCircle($this->x, $this->y, $this->radius);
    }

    public function resizeByPercentage($pct) {
        $this->radius *= $pct;
    }
}

// Client code
$shapes = array(
    new CircleShape(1, 2, 3, new DrawingAPI1()),
    new CircleShape(5, 7, 11, new DrawingAPI2()),
);

foreach ($shapes as $shape) {
    $shape->resizeByPercentage(2.5);
    $shape->draw();
}

?>
