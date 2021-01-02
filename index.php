<html>
<head>
	<?php include('head.php');  ?>
</head>
<body>
	
    
    <div class="col-md-6 col-sm-6" id="div_opcao">
 
        <center>
        <span id="div_icon">
            <img src="images/icon_principal.jpg" alt="icon" id="icon" class="rounded-circle">
        </span>
        </center>
        
            <div class="col-md-6 col-sm-6"style="float: left;">
                <span >
                    <img src="images/cliente.jpg" id="client" class="rounded-circle">
                </span>
                <center>
                    <br>
                    <a href="cliente_login.php" class="btn btn-secondary" id="bt_cliente">Cliente</a>
                </center>
            </div>
            
            <div class="col-md-6 col-sm-6" style="float:right; " >
                <span >
                    <img src="images/loja.jpg" id="loja" class="rounded-circle">
                </span>
                <center>
                    <br>
                    <a href="login.php" class="btn btn-secondary" id="bt_loja">Loja</a>
                </center>
            </div>
            
    </div>  
    
        <footer>
            <br>
            <center>
            <label> </label>
            </center>
            <?php include 'footer.php'; ?>
        </footer>
       
</body>
</html>