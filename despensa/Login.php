<?php 
  include("DB/database_connection.php");
  $message = "";

  if(isset($_POST["login"]))
  {
    if(empty($_POST["email"]) || empty($_POST["password"]))
    {
      $message = "<div class='alert alert-danger'>Ambos campos son requeridos.</div>";
    }
    else
    {
      $query = "SELECT * FROM usuario WHERE usuario.Email = '" . $_POST["email"] . "'";
      $statement = $connect->prepare($query);
      $statement->execute();
      $count = $statement->rowCount();
      if($count > 0)
      {
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
          if($_POST["password"] == $row["Password"])
          {
            header("location:plantilla2-sem.php");
          }
          else
          {
            $message = '<div class="alert alert-danger">Credenciales inválidas.</div>';
          }
        }
      }
      else
      {
        $message = "<div class='alert alert-danger'>Usuario no encontrado.</div>";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio de Sesión</title>
    <link href="./Login.css" rel="stylesheet">
    <link href="http://allfont.es/allfont.css?fonts=raleway-regular" rel="stylesheet" type="text/css" />
</head>

<body>
    <form method="POST" id="logForm">
        <?php echo $message;?>

        <div class="login-box">

            <header>
                <h1>Inicio de Sesión</h1>
                <h2>Despensa Online</h2>
            </header>
            
            <div>
                


                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <label for="password">Contraseña: </label>
                <input type="password" name="password" id="password" required minlength="4">
                
                <input type="submit" form="logForm" id="login" name="login" value="Iniciar Sesion">
                

                <p class="texto1">Al hacer clic en "Iniciar Sesión" estas de acuerdo con nuestros <span class="colorAzul">Términos y Condiciones</span> y con la <span class="colorAzul">Política de Privacidad</span></p>

            </div>


        </div>
        <div>

            <p class="texto2">¿No tienes cuenta? registrate<a href="./Registro.html"> aquí</a></p>
        </div>
    </form>
</body>

</html>