<?php
include("conexion.php");

// Proceso de eliminar (borrar un usuario)
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    if ($id) {
        $consulta = "DELETE FROM usuarios WHERE id='$id'";
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            header('Location: crud.php');
        } else {
            echo '<p class="error">Ocurrió un error: ' . mysqli_error($conex) . '</p>';
        }
    }
}

// Proceso de leer (mostrar todos los usuarios)
$consultaUsuarios = "SELECT * FROM usuarios";
$resultadoUsuarios = mysqli_query($conex, $consultaUsuarios);
$usuarios = mysqli_fetch_all($resultadoUsuarios, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <style>
        /* Agregar tus estilos aquí */
        body {
            background-image: url('https://i.pinimg.com/736x/f0/50/05/f050056cf936a215ad3a89d447733c87.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #6a5acd;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }
        table th {
            background-color: #6a5acd;
            color: white;
        }
        .button {
            background-color: #6a5acd;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #5a4db3;
        }
        td{
            background-color:white;
        }
    </style>
</head>
<body>

<h1>Gestión de Usuarios</h1>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Modificar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= htmlspecialchars($usuario['nombre']); ?></td>
                <td><?= htmlspecialchars($usuario['apellido']); ?></td>
                <td><?= htmlspecialchars($usuario['email']); ?></td>
                <td><?= htmlspecialchars($usuario['usuario']); ?></td>
                <td><?= htmlspecialchars($usuario['fecha']); ?></td>
                <td><a href="modificar.php?id=<?= htmlspecialchars($usuario['id']); ?>" class="button">Modificar</a></td>
                <td><a href="?delete_id=<?= htmlspecialchars($usuario['id']); ?>" class="button" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="registrar.php" class="button">Agregar Usuario</a>

</body>
</html>
