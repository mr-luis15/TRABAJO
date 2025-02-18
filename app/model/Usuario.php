<?php

require_once 'database/Conexion.php';

class Usuario {
    
    private $id;
    private $PDO;
    public $nombre;
    public $correo;
    public $nivel;
    public $password;
    public $codigo;
    public $telefono;
    public $passwordHash;


    //Metodos de la clase
    public function __construct() {
        $conn = new Conexion();
        $this->PDO = $conn->conexion();
    }


    //Getters y Setters
    public function setId($id) {
        $this->id = $id;
    }


    public function getId() {
        return $this->id;
    }


    //Metodos CRUD
    public function crear() {

        $query = "INSERT INTO usuarios (nombre, telefono, correo, codigo_telefono, password, nivel) VALUES (:nombre, :telefono, :correo, :codigo_telefono, :password, :nivel)";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':codigo_telefono', $this->codigo);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':password', $this->passwordHash);
        $stmt->bindParam(':nivel', $this->nivel);

        return $stmt->execute() ? true : false;
    }


    public function eliminar() {

        $query = "DELETE FROM usuarios WHERE id_usuario = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute() ? true : false;
    }


    public function editar() {

        $query = "UPDATE usuarios SET nombre = :nombre, correo = :correo, codigo_telefono = :codigo, telefono = :telefono, nivel = :nivel WHERE id_usuario = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':codigo', $this->codigo);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':nivel', $this->nivel);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute() ? true : false;
    }


    //Metodos para verificar
    public function existeUsuarioByEmail() {

        $query = "SELECT * FROM usuarios WHERE correo = :correo";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? true : false;
    }


    public function existeTelefono() {

        $query = "SELECT * FROM usuarios WHERE telefono = :telefono";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? true : false;
    }


    public function esNivelValido() {

        $niveles = ['Administrador', 'Empleado', 'Cliente', 'Tecnico', 'Secretaria de Compras', 'Secretaria de Ventas'];

        foreach ($niveles as $nivel) {
            if ($this->nivel == $nivel) {
                return true;
            }
        }
        return false;
    }


    //Metodos para obtener
    public function obtenerPasswordHash() {

        $query = "SELECT password FROM usuarios WHERE correo = :correo";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->execute();

        $this->passwordHash = $stmt->fetchColumn();
    }


    public function obtenerDatos() {

        $query = "SELECT id_usuario, nombre, correo, telefono, nivel FROM usuarios WHERE correo = :correo";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_ASSOC) : false;
    }


    public function obtenerEmpleados() {

        $query = "SELECT id_usuario, nombre, correo, telefono, nivel, codigo_telefono FROM usuarios WHERE nivel = 'Administrador' OR nivel = 'Empleado' OR nivel='Secretaria de Compras' OR nivel='Secretaria de Ventas'";

        $stmt = $this->PDO->prepare($query);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
    }


    public function obtenerClientes() {

        $query = "SELECT id_usuario, nombre, correo, telefono, nivel, codigo_telefono FROM usuarios WHERE nivel = 'Cliente'";

        $stmt = $this->PDO->prepare($query);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
    }


    public function obtenerTecnicos() {

        $query = "SELECT id_usuario, nombre, correo, telefono, nivel, codigo_telefono FROM usuarios WHERE nivel = 'Tecnico'";

        $stmt = $this->PDO->prepare($query);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
    }


    public function obtenerUsuarioById() {

        $query = "SELECT id_usuario, nombre, correo, telefono, nivel, codigo_telefono FROM usuarios WHERE id_usuario = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    public function existeUsuarioById() {

        $query = "SELECT * FROM usuarios WHERE id_usuario = :id";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? true : false;

    }

    public function existeClienteById($id) {

        $query = "SELECT * FROM usuarios WHERE id_usuario = :id AND nivel = 'Cliente'";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCOunt() > 0 ? true : false;

    }

    public function existeTecnicoById($id) {

        $query = "SELECT * FROM usuarios WHERE id_usuario = :id AND nivel = 'Tecnico'";

        $stmt = $this->PDO->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCOunt() > 0 ? true : false;

    }

}

?>