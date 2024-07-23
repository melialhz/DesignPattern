<?php
require_once 'EnginFactory.php';
require_once 'Box.php';
require_once 'ParkManager.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $engins = [
        "Pelleteuse" => isset($_POST['Pelleteuse']) ? intval($_POST['Pelleteuse']) : 0,
        "Tractopelle" => isset($_POST['Tractopelle']) ? intval($_POST['Tractopelle']) : 0,
        "Nacelle" => isset($_POST['Nacelle']) ? intval($_POST['Nacelle']) : 0,
        "Bulldozer" => isset($_POST['Bulldozer']) ? intval($_POST['Bulldozer']) : 0,
        "Rouleau_Compresseur" => isset($_POST['Rouleau_Compresseur']) ? intval($_POST['Rouleau_Compresseur']) : 0,
    ];

    try {
        $totalEngins = array_sum($engins);

       
        $hasAllTypes = true;
        foreach ($engins as $quantity) {
            if ($quantity < 1) {
                $hasAllTypes = false;
                break;
            }
        }

        if ($totalEngins < 5 || $totalEngins > 8) {
            throw new Exception("Vous devez ajouter entre 5 et 8 engins par box.");
        }

        $box = new Box();

        foreach ($engins as $type => $quantity) {
            for ($i = 0; $i < $quantity; $i++) {
                $box->addEngin(EnginFactory::createEngin($type));
            }
        }

        $parkManager = ParkManager::getInstance();
        $parkManager->addBox($box);

       
        $_SESSION['last_box'] = serialize($box);

        echo "Succès";
        header("Refresh: 2; url=index.php");
        exit();
        
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
