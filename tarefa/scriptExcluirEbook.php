<?php
include 'funcoesBD.php';
$id = $_GET['id'];
$capa = $_GET['f'];

//echo "id: $id e capa $capa";
ExcluirEbook($con2,$id,$capa);
header('location:tabelaEbooks.php');


?>