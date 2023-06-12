<?php
include 'funcoesBD.php';
$dados = mostrarEbooks($con2);
//var_dump($dados);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar pessoas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <style>
        .foto{
            width: 4rem; /* */;
            height:2rem; /* */;
            border-radius: 1rem;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Gerenciar registros - Ebooks</h1>
    <table class="table w-75 mx-auto table-striped"> 
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>foto</th>
            <th colspan="2">opções</th>
            
        </tr>
    <?php foreach ($dados as $i) { ?>    

        <tr>
            <th><?=$i['idEbook']?></th>
            <th><?=$i['nomeEbook']?></th>
            <th><img class="foto" src="arquivoTarefa<?=$i['capaEbook']?>" alt=""> </th>
            <th><a href="editarEbook.php?id=<?=$i['idEbook']?> &f=<?=$i['capaEbook']?> &n=<?=$i['nomeEbook']?> &x=<?=$i['nomePdfEbook']?> ">Editar</a></th>
            <th><a href="scriptExcluirEbook.php?id=<?=$i['idEbook']?> &f=<?=$i['capaEbook']?>">Excluir</a></th>
        </tr>
        <?php } ?>
    </table>
</body>
</html>