<?php
$server = "localhost";
$banco = "projeto2";
$usuario = "root";
$senha = "";

function conectar($server, $banco, $usuario, $senha)
{
    try {
        $con = new PDO("mysql:host=$server;dbname=$banco;charset=utf8", $usuario, $senha);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    } catch (PDOException $e) {
        echo "falha ao conectar: " . $e->getMessage();
        return null;
    }
}

function cadastrarPessoa($con2, $nome, $foto, $info, $dtCad)
{
    $sql = "INSERT INTO pessoa(nomePessoa, fotoPessoa, infoPessoa, dtCadPessoa) VALUES(?, ?, ?, ?)";
    $consulta = $con2->prepare($sql);
    $consulta->bindValue(1, $nome);
    $consulta->bindvalue(2, $foto);
    $consulta->bindvalue(3, $info);
    $consulta->bindvalue(4, $dtCad);
    $consulta->execute();
}

function mostrarPessoas($con2)
{
    $sql = "SELECT * FROM pessoa ORDER BY dtCadPessoa LIMIT 5";
    $consulta = $con2->prepare($sql);
    $consulta->execute();
    $dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
}

function mostrarPessoasTabela($con2)
{
    $sql = "SELECT * FROM pessoa ORDER BY dtCadPessoa DESC";
    $consulta = $con2->prepare($sql);
    $consulta->execute();
    $dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
}

function ExcluirPessoa($con2, $id, $foto)
{
    $sql = "DELETE FROM pessoa WHERE idPessoa = ?";
    $consulta = $con2->prepare($sql);
    $consulta->bindvalue(1, $id);
    $consulta->execute();
    unlink("arquivos/img/$foto");
}

function editarPessoa($nome, $foto, $info, $id, $con2)
{
    $sql = "UPDATE pessoa SET nomePessoa = ?, fotoPessoa = ?, infoPessoa = ? WHERE idPessoa = ?";
    $consulta = $con2->prepare($sql);
    $consulta->bindvalue(1, $nome);
    $consulta->bindvalue(2, $foto);
    $consulta->bindvalue(3, $info);
    $consulta->bindvalue(4, $id);
    $resultado = $consulta->execute();
    return $resultado;
}

function cadastrarEbook($con2, $nome, $capa, $nomePdf, $dtCad)
{
    $sql = "INSERT INTO ebook(nomeEbook, capaEbook, nomePdfEbook, dtCadEbook) VALUES(?, ?, ?, ?)";
    $consulta = $con2->prepare($sql);
    $consulta->bindValue(1, $nome);
    $consulta->bindvalue(2, $capa);
    $consulta->bindvalue(3, $nomePdf);
    $consulta->bindvalue(4, $dtCad);
    $consulta->execute();
}

function mostrarEbooks($con2)
{
    $sql = "SELECT * FROM ebook ORDER BY dtCadEbook DESC LIMIT 5";
    $consulta = $con2->prepare($sql);
    $consulta->execute();
    $dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
}

function ExcluirEbook($con2, $id, $capa)
{
    $sql = "DELETE FROM ebook WHERE idEbook = ?";
    $consulta = $con2->prepare($sql);
    $consulta->bindvalue(1, $id);
    $consulta->execute();
    unlink("arquivoTarefa/$capa");
}

function editarEbook($nome, $capa, $nomePdf, $id, $con2)
{
    $sql = "UPDATE ebook SET nomeEbook = ?, capaEbook = ?, nomePdfEbook = ? WHERE idEbook = ?";
    $consulta = $con2->prepare($sql);
    $consulta->bindvalue(1, $nome);
    $consulta->bindvalue(2, $capa);
    $consulta->bindvalue(3, $nomePdf);
    $consulta->bindvalue(4, $id);
    $resultado = $consulta->execute();
    return $resultado;
}

$con2 = conectar($server, $banco, $usuario, $senha);
?>
