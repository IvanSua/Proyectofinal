<?php
 require 'database.php';

 $message = '';

 if (!empty($_POST['email']) && !empty($_POST['password'])) {
   $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':email', $_POST['email']);
   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
   $stmt->bindParam(':password', $password);

   if ($stmt->execute()) {
     $message = 'Successfully created new user';
   } else {
     $message = 'Sorry there must have been an issue creating your account';
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
    <link rel="stylesheet" href="/css/registrate.css">
  </head>
  <body>
  <header>
    <a href="/login.php">LovePets</a>
</header>
<?php if(!empty($message)): ?>

      <p> <?= $message ?></p>

<?php endif; ?>
    <div class="login-box">
      <img src="/iconos/logo.png" class="avatar" alt="Avatar Image">
      <h1>Iniciar sesion</h1>
      <form>
        <label for="username">Usuario</label>
        <input type="text" placeholder="Ingresa tu usuario">

        <label for="password">Contraseña</label>
        <input type="password" placeholder="Ingresa tu contraseña">

        <label for="email">Email</label>
        <input type="email" placeholder="Ingresa tu Email">
        
        <input type="submit" value="Registrarce">
        <a href="/login.php">Iniciar sesion</a><br>
        <a href="index.html">Volver</a>
      </form>
    </div>
  </body>
</html>