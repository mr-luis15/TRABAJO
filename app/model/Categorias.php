<?php


require_once 'database/Conexion.php';

class Categorias {

    private $id;
    private $nombre;
    private $descripcion;
    private $numeroProductos;
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

    public function setDescripciob($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setNumeroProductos($numeroProductos) {
        $this->numeroProductos = $numeroProductos;
    }



    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripciob() {
        return $this->descripcion;
    }

    public function getNumeroProductos() {
        return $this->numeroProductos;
    }



    public function crear() {

        $query = "INSERT INTO categorias (nombre, descripcion) VALUES (:nombre, :descripcion)";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);

        return $stmt->execute() ? true :  false;

    }


    public function eliminar() {

        $query = "DELETE FROM usuarios WHERE id = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute() ? true :  false;

    }


    public function existeCategoriaByNombre() {

        $query = "SELECT * FROM categorias WHERE nombre = :nombre";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? true :  false;

    }

    public function obtenerCategorias() {

        $query = "SELECT * FROM categorias";

        $stmt = $this->PDO->prepare($query);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;

    }


    public function existeCategoriaById() {

        $query = "SELECT id FROM categorias WHERE id = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? true :  false;

    }

}



