<html>
<head>
	<?php 
        include('head.php'); 
            $edit_email = "";
            $edit_senha = "";
            $email = isset($_POST['email'])? $_POST['email'] : '';
            $senha = isset($_POST['senha'])? $_POST['senha'] : '';
            
            if(!empty($email) && !empty($senha)){
                $edit_email = "$email";
                $edit_senha = $senha;
               //header('Location: http://localhost/Trabalho_Liguagem_4/proximo.php');
            }else{
                echo "<script>alert('nao nao');</script>";
            }
        ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--    <script type="text/javascript">
        $(document).ready(function (){
        function myfunction(){
                    var nome_client = $("#nome_client").val();
                    var telefone = $("#telefone").val();
                    var endereco = $("#endereco").val();
                    var complemento= $("#complento").val();
                    var email = document.getElementById("email_prox").val();
                    var senha = document.getElementById("senha_prox").val();
                    var xhttp;
                    xhttp = new XMLHttpRequest();
                       xhttp.open("POST", "http://localhost/Trabalho_Liguagem_IV/pasta_sql/Cadastre_cliente.php?nome_client=" +nome_client+"&telefone= "+telefone+
                               "&email ="+email+"&senha="+senha+"&endereco="+endereco+"&complemento="+complemento, true);
                       xhttp.send();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        $("#nome_client").val("");
                        $("#telefone").val("");
                        $("#endereco").val("");
                        $("#complento").val("");
                        alert('cliente foi cadastrado com succeso');
                        //var url = "http://localhost/Trabalho_Liguagem_IV/cliente_login.php";
                       // window.location = url;
                    }
                    };
                };  
            document.getElementById("btcadast_cli").onclick = myfunction();
    });
    </script>-->
</head>
<body>
   
   
       
    <div class="col-md-6 col-sm-6" id="div_proximo_etapa_cadast_novo_client">
        <form action="pasta_sql/Cadastre_cliente.php" method="post" id="form_proxim_etape_cadas_nov0_client">
            <label>Complementar Dados</label>
            <legend style="border: 1px solid black"></legend>
            
            <input type="text" class="form-control" name="nome" placeholder="Informe Seu Nome" id="nome_client">
            <legend></legend>
             <input type="tel" class="form-control" name="telefone" placeholder="Telefone">
             <legend></legend>
             <input type="text" class="form-control" name="endereco" placeholder="Informe Sua Endereço">
             <legend></legend>
             <input type="text" class="form-control" name="complemento" placeholder="Complemento">
             <legend></legend>
             <?php
             echo'
             <input type="text" class="form-control" name="email" id="email_prox" value="'.$edit_email.'"  hidden>
             <input type="text" class="form-control" name="senha" id="senha_prox" value="'.$edit_senha.'" hidden>
             ';?>
             <input class="btn btn-secondary" type="Submit" style="margin-top: 25px;float: right" value="Cadastrar">         
             
        </form>        
    </div>
    
</body>
</html>
