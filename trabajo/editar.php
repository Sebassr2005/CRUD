<?php
include 'crud.php';

$id = $_GET['id'];
$usuarios = readData();
$usuario = null;

// Encontrar el usuario a editar
foreach ($usuarios as $u) {
    if ($u['id'] == $id) {
        $usuario = $u;
        break;
    }
}

// Si el usuario no existe, redirecciona
if (!$usuario) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>
    <form method="POST" action="crud.php">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $usuario['email'] ?>" required><br>
        <button type="submit" name="editar">Guardar Cambios</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>
