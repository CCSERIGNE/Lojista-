<?php
include './conexao.php';

$nome_pro = isset($_GET['nome_pro'])? $_GET['nome_pro'] : '';
$tamanho = isset($_GET['tamanho'])? $_GET['tamanho'] : '';
$preco  = isset($_GET['preco'])? $_GET['preco'] : '';
$detail = isset($_GET['detail'])? $_GET['detail'] : '';

 

$conn = OpenCon();
$cadastre = cadatre_nove_produto($nome_pro, $tamanho, $preco, $detail);

if(!$cadastre){
 echo "<script>alert('cão nao foi realizado tent de novo!');document.location='cadastre_produto.php';</script>";

} else {
    echo "<script>alert('acão nao foi realizado tent de novo'.$tamanho .'!');</script>";
}