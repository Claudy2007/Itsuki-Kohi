<?php
include("conexion.php");

$mensaje = '';

if (
    isset($_POST['nombre']) && strlen($_POST['nombre']) >= 1 &&
    isset($_POST['apellido']) && strlen($_POST['apellido']) >= 1 &&
    isset($_POST['email']) && strlen($_POST['email']) >= 1 &&
    isset($_POST['password']) && strlen($_POST['password']) >= 1 &&
    isset($_POST['nom_usuario']) && strlen($_POST['nom_usuario']) >= 1 &&
    isset($_POST['fecha']) && strlen($_POST['fecha']) >= 1
) {
    $name = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $usuario = trim($_POST['nom_usuario']);
    $fecha = date("Y-m-d");

    if(filter_var($email, FILTER_VALIDATE_EMAIL) && $resultado){
      
      $consulta = "INSERT INTO usuarios(nombre, apellido, email, password, nom_usuario, fecha) VALUES ('$name', '$apellido', '$email', '$password', '$usuario', '$fecha')";
      $resultado = mysqli_query($conex, $consulta);
      $mensaje = '<p class="success">Tu registro se ha completado</p>';
      }else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
       $mensaje = '<p class="error">Tu correo no es válido, por favor intenta de nuevo</p>';
      }else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $mensaje = '<p class="error">Llena todos los campos</p>';
      }else {
        $mensaje = '<p class="error">Ocurrió un error: ' . mysqli_error($conex) . '</p>';
      }
}



    $usuario = $_POST ['nom_usuario'];
    $password = $_POST ['password'];

    $hash = md5(rand(0,1000));
    $email = $_POST ['email'];

    $to = $email;//destinatario del correo
    $subject = 'Inicio de sesión!//Verificación de cuenta'; //Asunto delo correo
    $message =
        "¡Gracias por registrarte y bienvenid@!
        Tu cuenta ha sido creada, y puedes verificarla con el link de abajo :D.
        
      ------------------------------------------------
        Tu correo es:'.$email.'
        Tu nombre de usuario es: '.$nom_usuario.'

      -------------------------------------------------

      Por favor dale clic al siguente enlace para verificar tu cuenta:
      http://aquivaelnombrededominio.com/php/activar.php?email='.$email.'&hash='.$hash.' 
        ";

    $headers = 'From:hannacramirezb@juandelcorral.edu.co' . "\r\n"; // Colocar el encabezado
    mail($to, $subject, $message, $headers); // Enviar el correo electrónico
    if($stmt->execute()){
      $message ='Successful';
      header('Location: login.php');
      $msg='Tu cuenta ha sido verificada' // En caso de que sea satisfactorio el proceso, se redirige al formulario de Login
      } else {
          $message = 'Ups :c Algo salió mal';
      } 
     

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="style/registrar.css" />
  <link rel="icon" type="image/x-icon" href="itsuki.ico" />
  <style>
    /* Estilos generales */
    html, body {
      height: auto;
      margin: 0;
      padding: 0;
      font-family: 'Merriweather', serif;
    }

    body {
      display: flex;
      flex-direction: column;
      background-image: url("img/fondoserio.png");
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
    }

    nav {
      background: #9c78ac;
      padding: 0 20px;
      height: 15vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
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

    body > *:not(nav) {
      padding-top: 15vh;
    }

    .registro {
      background-color: #af9ec8cb;
      padding: 20px;
      margin: 170px auto 10px; /* Añadir un margen superior para separar del nav */
      width: 450px;
      height: 670px;
      border-radius: 56px;
      font-family: 'Inter', sans-serif;
      color: #3e007b;
      font-size: 49px;
      text-align: center;
    }

    .controls {
      width: 100%;
      background: rgb(233, 233, 233);
      padding: 15px;
      margin: 15px 0;
      border-radius: 10px;
      border: 1px solid #9c78ac;
      font-family: 'Inter', sans-serif;
      font-size: 18px;
    }

    .registro .botons {
      width: 100%;
      background: linear-gradient(135deg, #7a4b8b, #a887bb);
      border: none;
      padding: 20px;
      color: white;
      margin: 16px 0;
      font-size: 20px;
      border-radius: 10px;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      background: linear-gradient(135deg, #5a3470, #81638d);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
      transform: translateY(-3px);
    }

    

    .success {
      color: green;
      font-size: 14px; /* Tamaño de fuente más pequeño */
    }

    .error {
      color: red;
      font-size: 14px; /* Tamaño de fuente más pequeño */
    }

    /* Footer */
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
  </style>
  <title>Registrate!</title>
</head>
<body>
    <nav>
      <input type="checkbox" id="check" />
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <a href="Inicio.html" class="enlace">
        <img src="logo.png" alt="Logo" class="logo" />
      </a>
      <ul>
        <li><a class="active" href="Inicio.html">Inicio</a></li>
        <li><a href="menu.php">Pedidos</a></li>
        <li><a href="contactanos.html">Contáctanos</a></li>
        <li><a href="index.php">Iniciar Sesión</a></li>
      </ul>
    </nav> 

    <section class="registro">
      <b><center>REGÍSTRATE</center></b>
      
      <form action="registrar.php" method="post">
        <input
          class="controls"
          type="text"
          name="nombre"
          id="nombre"
          placeholder="Nombre"
        />
        <input
          class="controls"
          type="text"
          name="apellido"
          id="apellido"
          placeholder="Apellido"
        />
        <input
          class="controls"
          type="email"
          name="email"
          id="email"
          placeholder="Correo Electrónico"
        />
        <input
          class="controls"
          type="password"
          name="password"
          id="password"
          placeholder="Contraseña"
        />
        <input
          class="controls"
          type="text"
          name="usuario"
          id="usuario"
          placeholder="Nombre de usuario"
        />
        <input
          class="controls"
          type="date"
          name="fecha"
          id="fecha"
          placeholder="Fecha de Nacimiento"
        />
        <?php echo $mensaje; ?>
        <input class="botons" type="submit" value="Registrar" />
      </form>
    </section>
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
