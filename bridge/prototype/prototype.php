<?php

// Prototype interface
interface Prototype {
    public function __clone();
}

// Concrete Prototype class
class ConcretePrototype implements Prototype {
    private $name;
    private $data;

    public function __construct($name, $data) {
        $this->name = $name;
        $this->data = $data;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    // Clone method
    public function __clone() {
        // Perform deep copy if necessary
        // For simplicity, shallow copy is used here
    }
}

// Client code
class Client {
    public function createPrototype(Prototype $prototype) {
        return clone $prototype;
    }
}

// Usage example
$original = new ConcretePrototype("Original", ["key" => "value"]);
$client = new Client();
$clone = $client->createPrototype($original);

// Modify the clone
$clone->setName("Clone");

echo "Original: " . $original->getName() . "\n";
echo "Clone: " . $clone->getName() . "\n";
?>
