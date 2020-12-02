<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

    <?php
        include "../../templates/includes.php";
    ?>
    <link rel="stylesheet" href="./galeria/style.css">

    <title>MAD Clinic - Galeria</title>
</head>

<body>

    <?php
        include "../../templates/header.php";
        include "../../templates/nav.php";
    ?>

    <div class="container">
    
        <main>

            <div class="row g-3">

                <div class="col-lg">
                    <img src="../../images/Clinica1.jpg" alt="imagem das nossas instalações 1">
                </div>

                <div class="col-lg">
                    <img src="../../images/Clinica2.jpg" alt="imagem das nossas instalações 2">
                </div>

                <div class="col-lg">
                    <img src="../../images/Clinica3.jpg" alt="imagem das nossas instalações 3">
                </div>
            
                <div class="col-lg">
                    <img src="../../images/Clinica4.jpg" alt="médica preenchendo uma planilha">
                </div>

                <div class="col-lg">
                    <img src="../../images/Clinica5.jpg" alt="imagem dos nossos equipamentos 1">
                </div>

                <div class="col-lg">
                    <img src="../../images/Clinica6.jpg" alt="imagem dos nossos equipamentos 2">
                </div>

                <div class="col-lg">
                    <img src="../../images/Clinica7.jpg" alt="imagem do quarto de um dos quartos de nossa clinica">
                </div>

                <div class="col-lg">
                    <img src="../../images/Clinica8.jpg" alt="médico com estetoscópio">
                </div>
            
            </div>
        
        </main>

    </div>

    <?php
        include "../../templates/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy"
        crossorigin="anonymous"></script>

</body>

</html>