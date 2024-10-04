<?php
include("conexion.php");

$mensaje = '';

if (
    isset($_POST['Crear_pedido']) && strlen($_POST['Crear_pedido']) >= 1 &&
    isset($_POST['Modificar_pedido']) && strlen($_POST['Modificar_pedido']) >= 1
) {
    $codigo = trim($_POST['Codigo_pedido']);
    $crear = trim($_POST['Crear_pedido']);
    $modificar = trim($_POST['Modificar_pedido']);

    $consulta = "INSERT INTO pedidos(Codigo_pedido, Crear_pedido, Modificar_pedido) VALUES ('$codigo', '$crear', '$modificar')";
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado) {
        $mensaje = '<p class="success">Tu registro se ha completado</p>';
    } else {
        $mensaje = '<p class="error">Ocurrió un error: ' . mysqli_error($conex) . '</p>';
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mensaje = '<p class="error">Llena todos los campos</p>';
    }
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
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: 'Merriweather', serif;
    }

    body {
      display: flex;
      flex-direction: column;
      background-image: url("https://img.freepik.com/vector-gratis/fondo-purpura-cielo-nublado-tarde-grupo-cumulos-nubes-cirros-ilustracion-dibujos-animados-plana_1284-62768.jpg?w=740&t=st=1691024771~exp=1691025371~hmac=4e54b5b4c5f239c6b1ff4997823cb5999ff58ab3f00df84380f50eaeb03c114f");
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
      min-height: 100vh;
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
      margin: 190px auto 20px; /* Añadir un margen superior para separar del nav */
      width: 450px;
      height: 490px;
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
      margin-top: 730px;
      background-color: #9c78ac;
      padding: 20px 0;
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

    .footer-col .social-links i {
      margin-top: 10px;
    }

    .footer-col .social-links a:hover {
      color: #24262b;
      background-color: #ffffff;
    }
  </style>
  <title>Registrar Pedido</title>
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
            <li><a  href="inicioAdmin.php">Inicio</a></li>
            <li><a href="facturacion.php">Facturación</a></li>
            <li><a class="active" href="pedidos.php">Pedidos</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="crud.php">Usuarios</a></li>
            <li><a href="inventario.php">Inventario</a></li>
    </nav> 

    <section class="registro">
      <b><center>PEDIDOS</center></b>
      
      <form action="pedidos.php" method="post">
        <input
          class="controls"
          type="text"
          name="Codigo_pedido"
          id="Codigo_pedido"
          placeholder="Código del Pedido"
        />
        <input
          class="controls"
          type="text"
          name="Crear_pedido"
          id="Crear_pedido"
          placeholder="Crear Pedido"
        />
        <input
          class="controls"
          type="text"
          name="Modificar_pedido"
          id="Modificar_pedido"
          placeholder="Modificar Pedido"
        />
        <?php echo $mensaje; ?>
        <input class="botons" type="submit" value="Registrar" />
      </form>
    </section>

    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col">
            <h4>Itsuki-Kohi</h4>
            <ul>
              <li><a href="#">Quiénes Somos</a></li>
              <li><a href="#">Empleo</a></li>
              <li><a href="#">Móvil</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Contáctanos</h4>
            <ul>
              <li><a href="#">Ayuda/Preguntas frecuentes</a></li>
              <li><a href="#">Prensa</a></li>
              <li><a href="#">Socios</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Más</h4>
            <ul>
              <li><a href="#">Menú Latte</a></li>
              <li><a href="#">Menú Comida</a></li>
              <li><a href="#">Menú Postres</a></li>
              <li><a href="#">Combos</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Información</h4>
            <div class="social-links">
              <a href="#"><i class="fab fa-youtube"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
