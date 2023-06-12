<?php
include 'funcoesBD.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$capa = $_FILES['capa'];
$nomePdf = filter_input(INPUT_POST, 'nomePdf', FILTER_SANITIZE_STRING);

editarEbook($nome, $capa, $nomePdf, $id, $con2);
header('location: tabelaEbooks.php');
?>
