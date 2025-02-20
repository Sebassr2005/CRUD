<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
</head>
<body>
    <h2>Agregar Nuevo Usuario</h2>
    <form method="POST" action="crud.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <button type="submit" name="crear">Crear</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>
