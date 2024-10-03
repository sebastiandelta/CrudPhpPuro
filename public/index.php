<?php
// public/index.php
require_once '../src/Usuario.php';

$usuario = new Usuario();

// Crear usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crear'])) {
    $usuario->crear($_POST['nombre'], $_POST['email'], $_POST['telefono']);
    header('Location: index.php');
}

// Actualizar usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    $usuario->actualizar($_POST['id'], $_POST['nombre'], $_POST['email'], $_POST['telefono']);
    header('Location: index.php');
}

// Eliminar usuario
if (isset($_GET['eliminar'])) {
    $usuario->eliminar($_GET['eliminar']);
    header('Location: index.php');
}

$usuarios = $usuario->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">

    <!-- Listar usuarios -->
    <h2 class="mb-4">Lista de Usuarios</h2>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario->id ?></td>
                <td><?= $usuario->nombre ?></td>
                <td><?= $usuario->email ?></td>
                <td><?= $usuario->telefono ?></td>
                <td>
                    <a href="editar.php?id=<?= $usuario->id ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="index.php?eliminar=<?= $usuario->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Formulario para crear usuarios -->
    <h2 class="mb-4">Crear Usuario</h2>
    <form action="index.php" method="POST" class="row g-3">
        <div class="col-md-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
        </div>
        <div class="col-md-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="col-md-4">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary mt-3" name="crear">Crear Usuario</button>
        </div>
    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
