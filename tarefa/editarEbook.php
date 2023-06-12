<?php
include "funcoesBD.php";
$id = $_GET['id'];


$con2 = conectar($server, $banco, $usuario, $senha);
$sql = "SELECT * FROM ebook WHERE idEbook = ?";
$consulta = $con2->prepare($sql);
$consulta->bindValue(1, $id);
$consulta->execute();
$dados = $consulta->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Ebook</title>  
    
</head>
<body>
    <div>
        <form action="scriptEditarEbook.php" method="post">
            <label for="id">ID</label>
            <input type="number" name="id" value="<?=$dados['idEbook']?>" readonly>
            
            <label for="nome">Nome do Ebook</label>
            <input type="text" name="nome" placeholder="Título ruim dá nisso" value="<?=$dados['nomeEbook']?>" required>

            <label for="capa">Pdf</label>
            <input type="file" name="nomePdf" placeholder="Troque sua foto que ela está feia" value="<?=$dados['nomePdfEbook']?>" required>

            <label for="nomePdf">Capa</label>
            <input type="file" name="capa" placeholder="Acho melhor você trocar isso" value="<?=$dados['capaEbook']?>" required>

            <input type="submit" value="Atualizar">
        </form>
    </div>
</body>
</html>

