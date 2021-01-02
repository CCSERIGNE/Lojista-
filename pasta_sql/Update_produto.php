<?php

include './conexao.php';

$cod_produto = isset($_GET['id_pro']) ? $_GET['id_pro'] : '';
$nome_pro = isset($_GET['nome_pro'])? $_GET['nome_pro'] : '';
$tamanho = isset($_GET['tamanho'])? $_GET['tamanho'] : '';
$preco  = isset($_GET['preco'])? $_GET['preco'] : '';
$detail = isset($_GET['detail'])? $_GET['detail'] : '';

$cadastre = update_produto($cod_produto, $nome_pro, $tamanho, $preco, $detail);

if (!$cadastre) {
    echo "<script>alert('Cod produto Nao Foi Achado!');document.location='tabela_produto.php';</script>";
    
} else {
    echo "<script>alert('Os Dados foi Atuslizado com sucesso!');document.location='tabela_produto.php';</script>";
}