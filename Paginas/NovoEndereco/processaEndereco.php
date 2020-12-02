 <?php
  $cep = $logradouro =  $bairro = $cidade = $estado =  "";

  //validação de dados
  if (isset($_POST["inputCEP"]))
    $cep = htmlspecialchars($_POST["inputCEP"]);
  if (isset($_POST["inputLogradouro"]))
    $logradouro = htmlspecialchars($_POST["inputLogradouro"]);
  if (isset($_POST["inputBairro"]))
    $bairro = htmlspecialchars($_POST["inputBairro"]);
  if (isset($_POST["inputCidade"]))
    $cidade = htmlspecialchars($_POST["inputCidade"]);
  if (isset($_POST["inputEstado"]))
    $estado = htmlspecialchars($_POST["inputEstado"]); 
  //fim validação

  if ($logradouro!= "" && $cep != ""&& $bairro != "" && $cidade != ""&& $estado != "") {
    /*
    *Adicionar o endereço no banco de dados e limpar os campos dos inputs
   */
  } else {
    //reload na página 
  }
  ?>