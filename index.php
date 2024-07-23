<?php
require_once 'ParkManager.php';
require_once 'Engins.php';

try {
    $box1 = new Box("Box 1");

    $box1->addEngin(new Pelleteuse());
    $box1->addEngin(new Tractopelle());
    $box1->addEngin(new Nacelle());
    $box1->addEngin(new Bulldozer());
    $box1->addEngin(new RouleauCompresseur());
    $box1->addEngin(new Pelleteuse());
    $box1->addEngin(new RouleauCompresseur());
    $box1->addEngin(new Nacelle());

    $parkManager = ParkManager::getInstance();
    $parkManager->addBox($box1); 

    $parkManager->displayBoxes();
} catch (Exception $e) {
    echo 'Erreur: ' . $e->getMessage();
}
?>
