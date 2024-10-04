<?php
include("conexion.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id) {
    $consulta = "DELETE FROM usuarios WHERE id='$id'";
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        header('Location: crud.php');
    } else {
        echo '<p class="error">Ocurrió un error: ' . mysqli_error($conex) . '</p>';
    }
} else {
    echo '<p class="error">ID de usuario no válido.</p>';
}
?>
