<?php

$email = isset($_GET['email']) ? $_GET['email'] : '';
$senha = isset($_GET['senha']) ? $_GET['senha'] : '';
$user = isset($_GET['user']) ? $_GET['user'] : '';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (empty($email) || empty($senha) || empty($user)) {
    if ($user == "cliente") {
        echo "<script>alert('verifica seus dados!');document.location='http://localhost/Trabalho_Liguagem_IV/cliente_login.php';</script>";
    } else if ($user == "loja") {
        echo "<script>alert('verifica seus dados !');document.location='http://localhost/Trabalho_Liguagem_IV/login.php';</script>";
    }
}

include './../pasta_sql/conexao.php';
if (empty($email)) {
    $emailErr = "Email is required";
} else {
    $email = test_input($email);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        if ($user == "loja") {
            echo "<script>alert('$emailErr!');document.location='http://localhost/Trabalho_Liguagem_IV/login.php';</script>";
        } else if ($user == "cliente") {
            echo "<script>alert('$emailErr!');document.location='http://localhost/Trabalho_Liguagem_IV/cliente_login.php';</script>";
        }
    } else {
        
        $conn = OpenCon();
        $result = mysqli_query($conn, "SELECT senha,email FROM cliente WHERE senha ='$senha' AND email= '$email' ");
        $row_cnt = $result->num_rows;
        
        
        if ($row_cnt > 0) {
            if ($user == "loja") {
                header('Location: http://localhost/Trabalho_Liguagem_4/cadastre_produto.php');
                CloseCon($conn);
                return true;
            } else if ($user == "cliente") {
                echo "<script>alert('Pagina de cliente esta em production!');document.location='http://localhost/Trabalho_Liguagem_IV/index.php';</script>";
            }
        } else {
              
            if ($user == "loja") {
               echo "<script>alert('Login Nao existe!');document.location='http://localhost/Trabalho_Liguagem_4/login.php';</script>";
            } else if ($user == "cliente") {
                //printf("Result set has %d rows.\n", $row_cnt);
               echo "<script>alert('Essa Conta  Nao existe!');</script>";
               header('Location: http://localhost/Trabalho_Liguagem_4/cliente_login.php');
                
            }
            
        }
    }
}

