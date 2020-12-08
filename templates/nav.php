<?php
// $user = "funcionario";
// $user = "medico";
$test = $_GET["test"];
?>

<nav class="navbar navbar-expand-md background-nav navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active"><a class="nav-link" href="../home/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="../galeria/">Galeria</a></li>
            <li class="nav-item"><a class="nav-link" href="../novo_endereco/">Novo endereço</a></li>
            <li class="nav-item"><a class="nav-link" href="../agendar_consulta/">Agendamento</a></li>
            <?php
            if ($user == "funcionario" || $user == "medico") {
                echo <<<HTML
                    <li class="nav-item"><a class="nav-link" href="#">Novo Funcionário</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Novo Paciente</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Listar Funcionários</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Listar Pacientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Listar Endereços</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Listar todos Agendamentos</a></li>
HTML;
                if ($user == "medico")
                    echo '<li class="nav-item"><a class="nav-link" href="#">Listar meus Agendamentos</a></li>';
            }
            if ($test)
                echo "<h1>$test</h1>"
            ?>
        </ul>
    </div>
</nav>