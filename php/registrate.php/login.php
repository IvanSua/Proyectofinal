<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /php-login");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="author" content="Ivan-Suarez-Ezequiel">
    <meta name="copyright" content="curso-utn-2021" />
    <meta name="description" content="Productos para mascotas para el aseo, alimentacion y jugetes para el cuidado de tus mascotas">
    <meta name="keywords" content="mascota-alimentos,mascota-aseo,mascota-jugetes,productos-para-gatos,prodcutos-para-perros,alimentos-para-perros,alimentos-para-gatos,aseo-para-perros,aseo-para-gatos,jugetes-para-perro,jugete-para-gato">
    <meta http-equiv="cache-control" content="no-cache"/> <!--por si se actualiza constantemente-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" user-scalable=no>
    <title>Love Pets-Inisio secion</title>
    <link rel="stylesheet" href="/css/inicio.css">
  </head>
  <body>
  <header>
    <a href="/login.php">LovePets</a>
</header>
    <div class="login-box">
      <img src="iconos/logo.png" class="avatar" alt="Avatar Image">
      <h1>Iniciar sesion</h1>
      <form>
        <label for="username">Usuario</label>
        <input type="text" placeholder="Ingresa tu usuario">
        <label for="password">Contraseña</label>
        <input type="password" placeholder="Ingresa tu contraseña">
        <input type="submit" value="Iniciar">
        <a href="">Registrate</a><br>
        <a href="index.html">Volver</a>
      </form>
    </div>
  </body>
</html>
