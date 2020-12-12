<?php
  session_start();
  if(isset($_SESSION["codigo"])) {
    header("Location: ../home/");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

  <link rel="stylesheet" href="./style.css">
  <script src="./login.js"></script>
  <title>MAD Clinic - Login</title>
</head>

<body>

  <div class="container">
    <main>
      <div class="loginBox">
        <h3 class="nome mb-4">MAD Clinic</h3>

        <form name="formLogin" class="form" action="./processaLogin.php" method="POST">
          <div class="form-floating">
            <input class="form-control" type="email" id="email" name="email" placeholder="seu e-mail">
            <span></span>
            <label for="email">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
              </svg>
              Email
            </label>
          </div>

          <?php
            if(isset($_GET["email_error"]))
              echo <<< HTML
              <div class="alert alert-warning alert-dismissible" role="alert">
                <strong>Email não encontrado</strong>
                <button type="button" class="btn-close" data-dismiss="alert"></button>
              </div>
              HTML;
          ?>

          <div class="form-floating mt-2">
            <input class="form-control" type="password" id="senha" name="senha" placeholder="sua senha">
            <span></span>
            <label for="senha">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock-fill text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z" />
                <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z" />
              </svg>
              Senha
            </label>
          </div>

          <?php
            if(isset($_GET["password_error"]))
              echo <<< HTML
              <div class="alert alert-warning alert-dismissible" role="alert">
                <strong>Senha inválida</strong>
                <button type="button" class="btn-close" data-dismiss="alert"></button>
              </div>
              HTML;
          ?>

          <div>
            <button type="submit" class="btn btn-primary mt-2">
              Entrar
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
              </svg>
            </button>

            <a href="../home/" class="btn btn-secondary mt-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
              </svg>
            </a>

          </div>

        </form>
      </div>
    </main>
  </div>

   <!-- JavaScript Bundle with Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous">
  </script>

</body>

</html>