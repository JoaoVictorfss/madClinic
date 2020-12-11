<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

    <?php
    include "../../templates/includes.php";
    ?>
    <link rel="stylesheet" href="./style.css">

    <title>MAD Clinic - Home</title>
</head>

<body>
    <?php
    include "../../templates/header.php";
    include "../../templates/nav.php";
    ?>

    <div class="container mb-5">
        <main>

            <?php
                $nome = $_SESSION["nome"];
                echo "<h1>Bem vindo $nome</h1>";
            ?>

            <section>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="descricao2 d-block"></div>
                            <div class="carousel-caption d-none d-md-block text-dark">
                                <h4>Profissionalismo</h4>
                                <p>Temos os melhores profissionais do mercado</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="descricao d-block"></div>
                            <div class="carousel-caption d-none d-md-block text-dark">
                                <h4>Conforto</h4>
                                    <p>Temos equipamentos com tecnologia de ponta, pensando em você</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon btn btn-secondary" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon  btn btn-secondary" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                </div>

                <h2>Justiça, Acessibilidade e Conforto</h2>

            </section>

            <section>
                <h3>Quem somos?</h3>

                <p>
                    MAD é um acrônimo que significa: MAD Affordable Doctors.
                    Somos uma clinica que tem como missão ser acessível ao máximo possivel tendo os preços
                    mais baixos do mercado. Nossa equipe é a mais capacitada <del>e barata</del> que o dinheiro
                    pode pagar e nossas instalações são insamente bem preparadas, proporcionando o máximo
                    de conforto para nossos clientes e suas carteiras.
                </p>

            </section>

            <section>
                <h3>Nossa missão</h3>

                <p>
                    Fundada em 2001 a MAD Clinic iniciou suas atividades com o diferencial nos preços insanamente baixos.
                    Cientes dos preços altos praticados em mercado temos como objetivo de ser a opção mais acessível
                    para toda a sociedade e desta maneira tornar os serviços de saúde mais justos e democráticos.
                </p>

            </section>

            <section>
                <h3>Visão</h3>

                <p>
                    Ser uma clínica de referência regional e mundial, comprometido com qualidade, sustentabilidade, ensino, desenvolvimento científico e inserção comunitária.
                </p>

            </section>

        </main>

    </div>

    <?php
    include "../../templates/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>

</body>

</html>