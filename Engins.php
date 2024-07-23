<?php

abstract class Engin {
    protected $type;

    public function getType() {
        return $this->type;
    }
}

class Pelleteuse extends Engin {
    public function __construct() {
        $this->type = "Pelleteuse";
    }
}

class Tractopelle extends Engin {
    public function __construct() {
        $this->type = "Tractopelle";
    }
}

class Nacelle extends Engin {
    public function __construct() {
        $this->type = "Nacelle";
    }
}

class Bulldozer extends Engin {
    public function __construct() {
        $this->type = "Bulldozer";
    }
}

class RouleauCompresseur extends Engin {
    public function __construct() {
        $this->type = "Rouleau_Compresseur";
    }
}
?>
