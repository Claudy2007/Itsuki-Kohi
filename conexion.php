
<?php
$conex = mysqli_connect("localhost","root","", "itsuki-kohi");
   if (!$conex){
        echo 'Error al conectar a la base de datos';
    }
else {
    echo 'Conectado a la base de datos';
}

?>
