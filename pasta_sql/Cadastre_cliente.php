<?php

include './conexao.php';

$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';

function insert_client_novo($email, $senha, $nome, $telefone, $endereco, $complemento) {
// insert a new item into the database
    $conn = OpenCon();
    // insert new item
    $demande = "INSERT INTO cliente(senha,email,nome_cliente,telefone,endereco,complemento) "
            . "VALUES ('$senha','$email ','$nome','$telefone','$endereco','$complemento')";
    $resultat = $conn->query($demande);
    return $resultat;
//    if (!$resultat) {
//            echo "<script>alert('nao deu certo');</script>";
//    } else {
//        echo "<script>alert('deu certooo');</script>";
//        return $conn->insert_id; // function will now return the ID instead of true. 
//    }
}

if(!empty($email) &&!empty($senha) &&!empty($nome) &&!empty($telefone) &&!empty($endereco) &&!empty($complemento)) {
    $query = insert_client_novo($email, $senha, $nome, $telefone, $endereco, $complemento);
    if (!$query) {
       echo "<script>alert('nao da certo');document.location='http://localhost/Trabalho_Liguagem_IV/novo_cliente.php';</script>";
    } else {
       echo "<script>alert('ohooo da certo');document.location='http://localhost/Trabalho_Liguagem_IV/index.php';</script>"; 
       
   }
}else{
    echo "<script>alert('dados vazios');</script>";
}
