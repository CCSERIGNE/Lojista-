<?php

function OpenCon() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "BD_linguagem_IV";
    //abre conexÃ£o mysql
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
    //fecha conexÃ£o mysql
    if (!$conn) {
        die("Erro : " . mysqli_connect_error());
    } else {

        return $conn;
    }
}

function CloseCon($conn) {
    $conn->close();
}



function cadatre_nove_produto($nome_pro, $tamanho, $preco, $detail) {
    // insert a new item into the database
    $conn = OpenCon();
    // insert new item
    $demande = "INSERT INTO produto(nome_produto,tamanho,preco,detail)"
            . " VALUES ('$nome_pro','$tamanho','$preco','$detail')";
    $resultat = $conn->query($demande);
    if (!$resultat) {
        return false;
    } else {
        return $conn->insert_id; // function will now return the ID instead of true. 
    }
}

function seleciona_produtos() {
    $conn = OpenCon();
    $result = mysqli_query($conn, "SELECT id_produto, nome_produto,tamanho,preco, detail FROM produto");
    CloseCon($conn);
    return $result;
}

function update_produto($cod_produto,$nome,$tamanho,$preco,$detail) {
    $conn = OpenCon();
    $result_select = mysqli_query($conn, "SELECT id_produto, nome_produto,tamanho,preco, detail FROM produto WHERE id_produto = '$cod_produto'");
    if ($result_select) {
       $result_dl = mysqli_query($conn, "UPDATE produto SET nome_produto='$nome',"
                    . "tamanho='$tamanho',preco='$preco',detail='$detail' WHERE id_produto = '$cod_produto'");
            if (!$result_dl) {
                die(" ");
                return false;
            } else {
                return true;
            }
        
    }
}

function deletar_produto($cod_produto) {
    $conn = OpenCon();
    $result_dl = mysqli_query($conn, "DELETE FROM produto WHERE id_produto = '$cod_produto'");
    if (!$result_dl) {
        echo "<script>alert('Cod produto Nao Foi Achado!');document.location='tabela_produto.php';</script>";
        die(" ");
    } else {
        echo "<script>alert('Os Dados foi Deletado com sucesso!');document.location='tabela_produto.php';</script>";
    }
}
