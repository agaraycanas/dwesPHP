<?php
class Carta {
    public $nombre;
    public $valor;
    public $img;
    
    function __construct($nombre,$valor,$img) {
        $this->nombre = $nombre;
        $this->valor = $valor;
        $this->img = $img;
    }
}
?>