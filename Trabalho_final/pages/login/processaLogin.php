 <?php
  mb_internal_encoding('UTF-8');

  $email = $senha = "";

  //validação de dados
  if (isset($_POST["email"]))
    $email = htmlspecialchars($_POST["email"]);
  if (isset($_POST["senha"]) && mb_strlen($senha) > 6)
    $senha = htmlspecialchars($_POST["senha"]);
  //fim validação

  if($email != "" && $senha != ""){
    /*
    *Lógica para requisitar banco de dados e redirecionar página caso os exita este usuário, salvando os dados no
    *localStorage para manter a sessão até o usuário fazer logout. 
   */
  }else{
     //reload na página 
  }
  ?>