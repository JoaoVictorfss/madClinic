 <?php
  $email = $senha = "";

  //validação de dados
  if (isset($_POST["email"]))
    $email = htmlspecialchars($_POST["email"]);
  if (isset($_POST["senha"]))
    $senha = htmlspecialchars($_POST["senha"]);
  //fim validação

  if($email != "" && $senha != ""){
    header("Location: /pages/home/");
    /*
    *Lógica para requisitar banco de dados e redirecionar página caso os exita este usuário, salvando os dados no
    *localStorage para manter a sessão até o usuário fazer logout. 
   */
  }else{
     //reload na página 
     return;
  }
  ?>