<?php
// Ruta del archivo JSON
$file = 'data.json';

// Función para leer los datos
function readData() {
    global $file;
    if (!file_exists($file)) {
        file_put_contents($file, json_encode([])); // Crea el archivo si no existe
    }
    $data = file_get_contents($file);
    return json_decode($data, true);
}

// Función para escribir datos
function writeData($data) {
    global $file;
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

// Crear usuario
if (isset($_POST['crear'])) {
    $usuarios = readData();
    $nuevo_usuario = [
        'id' => count($usuarios) + 1,
        'nombre' => $_POST['nombre'],
        'email' => $_POST['email']
    ];
    $usuarios[] = $nuevo_usuario;
    writeData($usuarios);
    header('Location: index.php');
    exit();
}

// Eliminar usuario
if (isset($_GET['eliminar'])) {
    $usuarios = readData();
    $id = $_GET['eliminar'];
    foreach ($usuarios as $key => $usuario) {
        if ($usuario['id'] == $id) {
            unset($usuarios[$key]);
        }
    }
    writeData(array_values($usuarios)); // Reindexa el array
    header('Location: index.php');
    exit();
}

// Editar usuario
if (isset($_POST['editar'])) {
    $usuarios = readData();
    $id = $_POST['id'];
    foreach ($usuarios as &$usuario) {
        if ($usuario['id'] == $id) {
            $usuario['nombre'] = $_POST['nombre'];
            $usuario['email'] = $_POST['email'];
        }
    }
    writeData($usuarios);
    header('Location: index.php');
    exit();
}
?>
