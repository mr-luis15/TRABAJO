<?php

require_once 'database/Conexion.php';


class Servicios
{

    private $id;
    private $cliente;
    private $tecnico;
    private $descripcion;
    private $direccion;
    private $fecha;
    private $estado;
    private $PDO;

    public function __construct()
    {
        $conn = new Conexion();
        $this->PDO = $conn->conexion();
    }

    public function getTecnico() {
        return $this->tecnico;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    public function setTecnico($tecnico)
    {
        $this->tecnico = $tecnico;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }



    public function crear()
    {

        $query = "INSERT INTO servicios (id_cliente, id_tecnico, descripcion, direccion, estado, fecha_servicio) VALUES (:cliente, :tecnico, :descripcion, :direccion, :estado, :fecha)";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':cliente', $this->cliente);
        $stmt->bindParam(':tecnico', $this->tecnico);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':fecha', $this->fecha);

        return $stmt->execute() ? true : false;
    }




    public function editar() {
        
        $query = "UPDATE servicios SET descripcion = :descripcion, fecha_servicio = :fecha_servicio, estado = :estado, id_cliente = :cliente, id_tecnico = :tecnico, direccion = :direccion WHERE id_servicio = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':cliente', $this->cliente);
        $stmt->bindParam(':tecnico', $this->tecnico);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':fecha_servicio', $this->fecha);
        
        return $stmt->execute() ? true : false;

    }


    public function existeServicioById() {

        $query = "SELECT * FROM servicios WHERE id_servicio = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? true : false;

    }


    public function obtenerServiciosNoRealizados()
    {
        $query = "SELECT s.id_servicio, s.direccion, s.descripcion, s.estado, s.fecha_servicio, u1.nombre AS nombre_cliente, u2.nombre AS nombre_tecnico FROM servicios s JOIN usuarios u1 ON s.id_cliente = u1.id_usuario LEFT JOIN usuarios u2 ON s.id_tecnico = u2.id_usuario WHERE s.estado = 'No realizado'";

        $stmt = $this->PDO->prepare($query);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
    }


    public function obtenerServiciosRealizados()
    {
        $query = "SELECT s.id_servicio, s.direccion, s.descripcion, s.estado, s.fecha_servicio, u1.nombre AS nombre_cliente, u2.nombre AS nombre_tecnico FROM servicios s JOIN usuarios u1 ON s.id_cliente = u1.id_usuario LEFT JOIN usuarios u2 ON s.id_tecnico = u2.id_usuario WHERE s.estado = 'Realizado'";


        $stmt = $this->PDO->prepare($query);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
    }



    public function cambiarEstadoServicio($estado)
    {

        $query = "UPDATE servicios SET estado = :estado WHERE id_servicio = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':estado', $estado);

        return $stmt->execute() ? true : false;
    }


    public function obtenerServicioById() {

        $query = "SELECT s.id_cliente, c.nombre AS nombre_cliente, s.id_tecnico, t.nombre AS nombre_tecnico,s.descripcion,s.estado,s.direccion,s.fecha_servicio, s.id_servicio FROM servicios s JOIN usuarios c ON s.id_cliente = c.id_usuario LEFT JOIN usuarios t ON s.id_tecnico = t.id_usuario WHERE id_servicio = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;

    }



    public function eliminar()
    {

        $query = "DELETE FROM servicios WHERE id_servicio = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute() ? true : false;
    }
}

?>
