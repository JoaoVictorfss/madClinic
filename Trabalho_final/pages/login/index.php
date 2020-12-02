<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

  <?php
    include "../../templates/includes.php";
  ?>
  <link rel="stylesheet" href="./style.css">
  <script src="./login.js"></script>
  <title>MAD Clinic - Login</title>
</head>

<body>

  <?php
    include "../../templates/header.php";
    include "../../templates/nav.php";
  ?>

  <div class="container">
    <main>
      <div class="loginBox">
        <form name="formLogin" class="form" action="./login/processaLogin.php" method="POST">
          <div class="form-floating mb-3">
            <input class="form-control" type="email" id="email" name="email" placeholder="seu e-mail">
            <span></span>
            <label for="email">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill text-primary"
                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
              </svg>
              Email
            </label>
          </div>

          <div class="form-floating mb-3">
            <input class="form-control" type="password" id="senha" name="senha" placeholder="sua senha">
            <span></span>
            <label for="senha">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock-fill text-primary" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M2.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z" />
                <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z" />
              </svg>
              Senha
            </label>
          </div>

          <div>
            <button type="submit" class="btn btn-primary mt-2">
              Entrar
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                <path fill-rule="evenodd"
                  d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
              </svg>
            </button>
          </div>

        </form>
      </div>
    </main>
  </div>

  <?php
    include "../../templates/footer.php";
  ?>

</body>

</html>