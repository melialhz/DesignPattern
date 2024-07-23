<?php


require_once 'Box.php';

class ParkManager {
    private static $instance = null;
    private $boxes = [];

    private function __construct() { }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new ParkManager();
        }
        return self::$instance;
    }

    public function addBox(Box $box) {
        $this->boxes[] = $box;
    }

    public function getBoxes() {
        return $this->boxes;
    }

    public function displayBoxes() {
        foreach ($this->boxes as $index => $box) {
            echo "Box " . ($index + 1) . " (" . $box->getName() . "):\n";
            foreach ($box->getEngins() as $engin) {
                echo "- " . $engin->getType() . "\n";
            }
            echo "\n";
        }
    }
}
?>
