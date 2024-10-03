<?php
require_once '../src/Usuario.php';

$usuario = new Usuario();
$usuarioActual = $usuario->obtenerPorId($_GET['id']);

if (!$usuarioActual) {
    die('Usuario no encontrado');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <h2 class="mb-4">Editar Usuario</h2>

    <form action="index.php" method="POST" class="row g-3">
        <input type="hidden" name="id" value="<?= $usuarioActual->id ?>">
        <div class="col-md-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $usuarioActual->nombre ?>" required>
        </div>
        <div class="col-md-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $usuarioActual->email ?>" required>
        </div>
        <div class="col-md-4">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $usuarioActual->telefono ?>" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary mt-3" name="actualizar">Actualizar Usuario</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
