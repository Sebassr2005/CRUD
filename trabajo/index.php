<?php
include 'crud.php';
$usuarios = readData();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD con PHP y JSON</title>
</head>
<body>
    <h2>Lista de Usuarios</h2>
    <a href="crear.php">Agregar Usuario</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= $usuario['nombre'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $usuario['id'] ?>">Editar</a> | 
                    <a href="crud.php?eliminar=<?= $usuario['id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
