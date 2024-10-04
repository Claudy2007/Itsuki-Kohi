<?php
$mensajeError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['username'];
    $contrasena = $_POST['password'];

    if ($usuario === "administrador" && $contrasena === "123456789") {
        // Redirigir a la página admin.php
        header("Location: inicioAdmin.php");
        exit();
    } else {
        $mensajeError = "Nombre de usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    <style>
        h1 {
            font-family: "Merriweather", serif; /* Fuente personalizada para encabezados */
            margin-bottom: 20px;
        }

        /* Estilos para la barra de navegación */
        nav {
            background: #9c78ac;
            height: 15vh;
            padding: 0 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .enlace {
            padding: 10px 20px;
        }
        .logo {
            height: 50px;
        }
        nav ul {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        nav ul li {
            display: inline-block;
            line-height: 70px;
            margin: 0 5vh;
        }
        nav ul li a {
            color: #fff;
            font-size: 16px;
            padding: 7px 20px;
            border-radius: 3px;
            text-transform: uppercase;
        }
        li a.active,
        li a:hover {
            background: #81638d;
            transition: 0.5s;
        }
        .checkbtn {
            font-size: 30px;
            color: #fff;
            float: right;
            line-height: 80px;
            margin-right: 40px;
            cursor: pointer;
            display: none;
        }
        #check {
            display: none;
        }
        .fondoizq {
            width: 50%;
            height: 90vh;
            left: -1.05px;
            top: 68px;
            display: flex;
        }
        .login {
            width: 25%;
            height: 55%;
            background-color: rgba(154, 119, 182, 0.48);
            border-radius: 10px;
            padding: 2%;
            text-align: center;
            align-content: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 65%;
            right: 12%;
            transform: translateY(-50%);
        }
        .login label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }
        .login input[type="text"],
        .login input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .login input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #9c78ac;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login input[type="submit"]:hover {
            background-color: #81638d;
        }
        .imgperfil {
            width: 15vh;
            height: 15vh;
            border-radius: 50%;
            position: absolute;
            top: -15%;
            right: 35%;
            display: block;
            border: 3px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .datos {
            list-style: none;
            display: block;
            padding-top: 5vh;
        }
        ul {
            list-style: none;
            display: block;
        }
        .footer {
            background-color: #9c78ac;
            padding: 30px 0;
        }
        .botons:hover {
            background-color: #81638d;
        }
        .container {
            max-width: 1170px;
            margin: auto;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
        }
        .footer-col {
            width: 25%;
            padding: 0 15px;
        }
        .footer-col h4 {
            font-size: 18px;
            color: #ffffff;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
        }
        .footer-col h4::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -10px;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }
        .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
        }
        .footer-col ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300;
            color: #ffffff;
            display: block;
            transition: all 0.3s ease;
        }
        .footer-col ul li a:hover {
            color: #ffffff;
            padding-left: 8px;
        }
        .footer-col .social-links a {
            display: inline-block;
            height: 40px;
            width: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            margin: 0 10px 10px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            transition: all 0.5s ease;
        }
        .footer-col .social-links a:hover {
            color: #24262b;
            background-color: #ffffff;
        }
        #mensajeError {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
        * {
        padding: 0;
        margin: 0;
        text-decoration: none; /*subrayado quita*/
        list-style: none; /*listas puntos quita*/
        box-sizing: border-box; /*los elementos no se salgan de contenedor*/
        }
        body {
        background: url(https://i.pinimg.com/originals/de/b5/fe/deb5fe1db9a3893118dc0357b1c87040.jpg);
        height: auto;
        width: auto;
        font-family: Arial, sans-serif; /* Fuente por defecto */
        }

        /* Estilos para la barra de navegación */

        h1 {
        font-family: "Merriweather", serif;
        font-size: 90px;
        color: #4d3275;
        }

        .bienvenida {
        width: 40%;
        height: 40%;
        position: absolute;
        right: 30%;
        top: 35%;
        text-align: center;
        background-color: #a57fbc98;
        border-radius: 2em;
        padding: 10vh;
        }
        .enlace {
        padding: 10px 50px;
        }
        .botons:hover {
        background-color: #81638d;
        }
        .container {
        max-width: 1170px;
        margin: auto;
        }
        .row {
        display: flex;
        flex-wrap: wrap;
        }
        ul {
        list-style: none;
        }
        #usuario {
        border: 2px solid red;
        padding: 10px;
        background-color: #ee7171;
        margin: 10px;
        }
        #contrasena {
        border: 2px solid red;
        padding: 10px;
        background-color: #f16a6a;
        margin: 10px;
        }
        .puerta:hover{
            background-color: #81638d;
        }

    </style>
</head>
<body>
    <nav>
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="Inicio.html" class="enlace">
            <img src="logo.png" alt="" class="logo" />
        </a>
        <ul>
            <li><a class="active" href="inicioAdmin.php">Inicio</a></li>
            <li><a href="facturacion.php">Facturación</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="crud.php">Usuarios</a></li>
            <li><a href="inventario.php">Inventario</a></li>
            <li id="puerta" ><a href="index.php"><img src="https://cdn-icons-png.flaticon.com/512/603/603018.png" width="50" height="40" ></a></li>
        </ul>
    </nav>
    <div class="bienvenida">
      <h1>¡Bienvenid@!</h1>
      <h2>Disfruta de nuestros servicios</h2>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Sobre Nosotros</h4>
                    <ul>
                        <li><a href="#">Nuestro Equipo</a></li>
                        <li><a href="#">Historia</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contacto</h4>
                    <ul>
                        <li><a href="#">Soporte</a></li>
                        <li><a href="#">Preguntas Frecuentes</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Síguenos</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  </body>
</html>