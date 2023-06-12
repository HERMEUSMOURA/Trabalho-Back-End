<?php
include 'funcoesBD.php';
$dados = mostrarEbooks($con2);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h2 class="text-center p-4">Dados Cadastrais</h2>
    <section class="d-flex justify-content-center">
    <?php foreach ($dados as $i) { ?>
        <div class="card" style="width: 18rem;">
            <img src="arquivoTarefa/<?=$i['capaEbook']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Nome: <?=$i['nomeEbook']?></h5>
                <p class="card-text">
                    Informações adicionais: <?=$i['nomePdfEbook']?><br>
                    Data Cadastral: <?=date("d/m/Y", strtotime($i['dtCadEbook']))?>
                </p>
                <a href="#" class="btn btn-primary">Ver todos</a>
            </div>
        </div>
    <?php } ?>
    </section>
</body>
</html>
