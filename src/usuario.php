<?php
// src/Usuario.php
require_once __DIR__ . '/../config/db.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = conectarDB();
    }

    public function obtenerTodos() {
        $stmt = $this->db->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function crear($nombre, $email, $telefono) {
        $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, email, telefono) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $email, $telefono]);
    }

    public function actualizar($id, $nombre, $email, $telefono) {
        $stmt = $this->db->prepare("UPDATE usuarios SET nombre = ?, email = ?, telefono = ? WHERE id = ?");
        return $stmt->execute([$nombre, $email, $telefono, $id]);
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
