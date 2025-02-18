<?php

require_once './database/Conexion.php';


class Producto {

    private $id;
    private $nombre;
    private $precio;
    private $stock;
    private $id_categoria;
    private $PDO;


    public function __construct()
    {
        $conn = new Conexion();
        $this->PDO = $conn->conexion();
    }



    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function setCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }


    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getCategoria() {
        return $this->id_categoria;
    }
}

?>