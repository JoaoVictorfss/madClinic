<?php
    // $user = "funcionario";
    // $user = "medico";
?>

<nav>
    <div class="container">
        <ul>
            <li class="col active"><a href="#">Home</a></li>
            <li class="col"><a href="#">Galeria</a></li>
            <li class="col"><a href="#">Novo endereço</a></li>
            <li class="col"><a href="#">Login</a></li>
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
            ?>
        </ul>
    </div>
</nav>