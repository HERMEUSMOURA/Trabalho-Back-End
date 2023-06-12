<?php
include 'funcoesBD.php';
$nome = $_POST['nomeEbook'];
$pdf = $_FILES['Pdf'];
$capa = $_FILES['capa'];
$dtCad = date('Y-m-d');


$nomeCapa = $capa['name'];
$nomePdf = $pdf['name'];
$tmpCapa = $capa['tmp_name'];
$tmpPdf = $pdf['tmp_name'];

$dir = "arquivoTarefa";
$dar = "ArquivoTarefa/pdf";

$ext = pathinfo($nomeCapa, PATHINFO_EXTENSION);
$exti = pathinfo($nomePdf, PATHINFO_EXTENSION);

$tiposArq = array("jpg", "png", "jpeg", "gif", "jfif", "webp");

$novoNome = "capa-" . uniqid() . "." . $ext;
$nomeNovo = "pdf-" . uniqid() . "." . $exti;


if (in_array($ext, $tiposArq) && $exti === "pdf") {
    move_uploaded_file($tmpCapa, $dir . '/' . $novoNome);
    move_uploaded_file($tmpPdf, $dar . '/' . $nomeNovo);
    cadastrarEbook($con2, $nome, $novoNome, $nomeNovo, $dtCad);
    echo "Upload com sucesso!";
    header("location: formUploadEbook.html");
} else {
    echo "Formato de arquivo inválido. Por favor, selecione uma capa de imagem e um PDF.";
}

?>
