<nav class="navbar navbar-expand-md background-nav navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ">
            <li class="nav-item active"><a class="nav-link" href="../home/">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="../galeria/">Galeria</a></li>
            <li class="nav-item"><a class="nav-link" href="../novo_endereco/">Novo endereço</a></li>
            <li class="nav-item"><a class="nav-link" href="../agendar_consulta/">Agendamento</a></li>

            <?php
                if (isset($_SESSION["codigo"])) {
                    echo <<<HTML
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cadastrar
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../criar_funcionario">Funcionário</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../criar_paciente">Paciente</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Listar
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../listar_funcionarios">Funcionários</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../listar_pacientes/">Pacientes</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../listar_enderecos/">Endereços</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../listar_todos_agendamentos/">Todos Agendamentos</a>
                    HTML;
                    if (isset($_SESSION["medico"]) && $_SESSION["medico"]) {
                        echo <<< HTML
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../listar_meus_agendamentos/">Meus Agendamentos</a>
                        HTML; 
                    }
                    echo <<< HTML
                            </div>
                        </li>
                    HTML;
                }
            ?>
        </ul>
    </div>
</nav>