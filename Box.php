<?php
require_once 'Engins.php'; 

class Box {
    private $engins = [];
    private $name;

    public function addEngin(Engin $engin) {
        if (count($this->engins) >= 8) {
            throw new Exception("La box est pleine.");
        }
        $this->engins[] = $engin;
    }

    public function hasAllTypes() {
        $types = [];
        foreach ($this->engins as $engin) {
            $types[$engin->getType()] = true;
        }
        return count($types) >= 5;
    }
    public function getEngins() {
        return $this->engins;
    }

    public function getName() {
        return $this->name;
    }
}
?>
