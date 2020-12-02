<?php
    // $user = "funcionario";
    // $user = "medico";
    $test = $_GET["test"];
?>

<nav>
    <div class="container">
        <ul>
            <li class="col"><a href="./home">Home</a></li>
            <li class="col"><a href="./galeria">Galeria</a></li>
            <li class="col"><a href="./novo_endereco">Novo endereço</a></li>
            <li class="col"><a href="./login">Login</a></li>
            <li class="col"><a href="#">Agendamento</a></li>
            <?php
                if($user == "funcionario" || $user == "medico") {
                    echo <<<HTML
                    <li class="col"><a href="#">Novo Funcionário</a></li>
                    <li class="col"><a href="#">Novo Paciente</a></li>
                    <li class="col"><a href="#">Listar Funcionários</a></li>
                    <li class="col"><a href="#">Listar Pacientes</a></li>
                    <li class="col"><a href="#">Listar Endereços</a></li>
                    <li class="col"><a href="#">Listar todos Agendamentos</a></li>
HTML;
                    if($user == "medico")
                        echo '<li class="col"><a href="#">Listar meus Agendamentos</a></li>';
                }
                if($test)
                    echo "<h1>$test</h1>"
            ?>
        </ul>
    </div>
</nav>