<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Registrate</title>
    <!-- Link para las plantilla de Bootstrap -->
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <!-- CSS de Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/estilo.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="public/css/signin.css" rel="stylesheet">
  </head>
  
<body class="text-center" style="background: url(public/img/background.jpg) no-repeat;">

    <main class="form-signin w-100 m-auto">
    
      <form action="signup/newUser" method="POST">
      
        <img class="mb-4" src="public/img/logo.png" alt="" width="90" height="90">
        <h1 class="h2 mb-3 fw-normal text-black shadow">Registrate</h1>
        
        <div><?php $this->showMessages(); ?></div>
        
        <div class="form-floating">
          <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com" required>
          <label for="floatingInput">Nombre de Usuario</label>
        </div>
        <div class="form-floating mt-2">
          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
          
        </div>
    
        <div class="checkbox mb-3">
          <label class="text-light">
            <input type="checkbox" value="remember-me" required> No soy un robot
          </label>
          
        </div>
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Nuevo Registro</button>
        
        <div></div>
 
      </form>
      <br>
      <a href="login" class="w-100 btn btn-lg btn-secondary">Iniciar Sesión</a>
      
      <?php require 'views/footer.php'; ?>
    </main>

  </body>
</html>