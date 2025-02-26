<?php

require_once 'database/Conexion.php';


class Producto {

    private $id;
    private $nombre;
    private $precio;
    private $stock;
    private $categoria;
    private $descripcion;
    private $estado;
    private $ruta_img;
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

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setImage($ruta_imagen) {
        $this->ruta_img = $ruta_imagen;
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
        return $this->categoria;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getImage() {
        return $this->ruta_img;
    }




    public function crear() {

        $query = "INSERT INTO productos (nombre, descripcion, precio, stock, categoria, estado, img_producto) VALUES (:nombre, :descripcion, :precio, :stock, :categoria, :estado, :img_producto)";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':categoria', $this->categoria);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':img_producto', $this->ruta_img);

        return $stmt->execute() ? true : false;
    }




    public function eliminar() {

        $query = "DELETE FROM productos WHERE id = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);
        

        return $stmt->execute() ? true : false;
    }




    public function editar() {

        $query = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock, estado = :estado, categoria = :categoria WHERE id = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':categoria', $this->categoria);

        return $stmt->execute() ? true : false;
    }

    



    public function obtenerProductos() {

        $query = "SELECT p.id, p.nombre, p.descripcion, p.precio, p.stock, p.estado, c.nombre AS categoria_nombre FROM productos p LEFT JOIN categorias c ON p.categoria = c.id";
    
        $stmt = $this->PDO->prepare($query);
        $stmt->execute();
    
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return !empty($resultado) ? $resultado : false;
    }
    





    public function existeProductoByNombre() {

        $query = "SELECT id FROM productos WHERE nombre = :nombre";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? true : false;

    }





    public function existeProductoById() {

        $query = "SELECT id FROM productos WHERE id = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? true : false;

    }





    public function obtenerProductoById() {

        $query = "SELECT p.id, p.nombre, p.descripcion, p.precio, p.stock, p.categoria, p.estado, c.nombre AS categoria_nombre FROM productos p LEFT JOIN categorias c ON p.categoria = c.id WHERE p.id = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_ASSOC) : false;

    }





    public function cambiarEstado($estado) {

        $query = "UPDATE productos SET estado = :estado WHERE id = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':estado', $estado);

        return $stmt->execute() ? true : false;
    }




    /*
    public function almacenarDatos($POST) {

        $datos = array["id", "nombre", ""]

        foreach ($POST as $dato) {

        }

    }
    */

}

