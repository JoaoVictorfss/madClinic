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
            if (isset($_SESSION["codigo"])) {
                echo <<<HTML
                    <li class="nav-item"><a class="nav-link" href="../criar_funcionario/">Novo Funcionário</a></li>
                    <li class="nav-item"><a class="nav-link" href="../criar_paciente/">Novo Paciente</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Listar Funcionários</a></li>
                    <li class="nav-item"><a class="nav-link" href="../listar_paciente/">Listar Pacientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="../listar_enderecos/">Listar Endereços</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Listar todos Agendamentos</a></li>
                HTML;

                if(isset($_SESSION["medico"]))
                    echo "<li class='nav-item'><a class='nav-link' href='#'>Listar meus Agendamentos</a></li>";
                
            }
            ?>
        </ul>
    </div>
</nav>