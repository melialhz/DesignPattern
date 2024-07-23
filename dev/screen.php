<?php
session_start();

require_once 'EnginFactory.php';
require_once 'Box.php';
require_once 'ParkManager.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LaPelleteuse.com - Gestion du parc</title>
   
</head>
<body>
    <div class="container">
        <h1>Gestion du parc LaPelleteuse.com</h1>
        <h2>Pour Ajouter une nouvelle box choisissez le nombre d'engins :</h2>
        <form action="process.php" method="post">
            <label for="pelleteuse">Pelleteuse:</label>
            <input type="number" name="Pelleteuse" min="1" max="3" value="0"><br>

            <label for="tractopelle">Tractopelle:</label>
            <input type="number" name="Tractopelle" min="1" max="3" value="0"><br>

            <label for="nacelle">Nacelle:</label>
            <input type="number" name="Nacelle" min="1" max="3" value="0"><br>

            <label for="bulldozer">Bulldozer:</label>
            <input type="number" name="Bulldozer" min="1" max="3" value="0"><br>

            <label for="rouleau">Rouleau Compresseur:</label>
            <input type="number" name="Rouleau_Compresseur" min="1" max="3" value="0"><br>

            <input type="submit" value="Ajouter la box">
        </form>
        <?php
        if (isset($_SESSION['last_box'])) {
            $lastBox = unserialize($_SESSION['last_box']);
            echo "<h2>Box créée récemment</h2>";
            echo "<ul class='box-list'>";
            foreach ($lastBox->getEngins() as $engin) {
                echo "<li>" . $engin->getType() . "</li>";
            }
            echo "</ul>";

            
            unset($_SESSION['last_box']);
        }
        ?>

        <h2>Boxes existantes</h2>
        <?php
        $parkManager = ParkManager::getInstance();
        foreach ($parkManager->getBoxes() as $index => $box) {
            echo "<h3>Box " . ($index + 1) . "</h3>";
            echo "<ul class='box-list'>";
            foreach ($box->getEngins() as $engin) {
                echo "<li>" . $engin->getType() . "</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>
</body>
</html>
