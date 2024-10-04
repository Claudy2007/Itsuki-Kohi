<?php
include("conexion.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $usuario = trim($_POST['usuario']);
    $fecha = trim($_POST['fecha']);

    $consulta = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email', password='$password', usuario='$usuario', fecha='$fecha' WHERE id='$id'";
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        header('Location: crud.php');
    } else {
        echo '<p class="error">Ocurrió un error: ' . mysqli_error($conex) . '</p>';
    }
} else {
    $consulta = "SELECT * FROM usuarios WHERE id='$id'";
    $resultado = mysqli_query($conex, $consulta);
    $usuario = mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Usuario</title>
    <style>
        /* Añadir estilos como desees */
    </style>
</head>
<body>
    <h1>Modificar Usuario</h1>
    <form action="modificar.php?id=<?= htmlspecialchars($id); ?>" method="post">
        <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']); ?>" placeholder="Nombre" required>
        <input type="text" name="apellido" value="<?= htmlspecialchars($usuario['apellido']); ?>" placeholder="Apellido" required>
        <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']); ?>" placeholder="Correo Electrónico" required>
        <input type="password" name="password" value="<?= htmlspecialchars($usuario['password']); ?>" placeholder="Contraseña" required>
        <input type="text" name="usuario" value="<?= htmlspecialchars($usuario['usuario']); ?>" placeholder="Usuario" required>
        <input type="date" name="fecha" value="<?= htmlspecialchars($usuario['fecha']); ?>" placeholder="Fecha de Nacimiento" required>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
