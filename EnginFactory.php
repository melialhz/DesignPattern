<?php


require_once 'Engins.php';

class EnginFactory {
    public static function createEngin($type) {
        switch ($type) {
            case "Pelleteuse":
                return new Pelleteuse();
            case "Tractopelle":
                return new Tractopelle();
            case "Nacelle":
                return new Nacelle();
            case "Bulldozer":
                return new Bulldozer();
            case "Rouleau_Compresseur":
                return new RouleauCompresseur();
            default:
                throw new Exception("Type d'engin inconnu.");
        }
    }
}
?>
