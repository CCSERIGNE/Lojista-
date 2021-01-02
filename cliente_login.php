<html>
    <head>
        <?php include('head.php'); ?>
        <style>
            /* Add a red text color and an "x" when the requirements are wrong */
            .invalid {
                color: red;
            }
            .valid{
                color: green;
            }
            /* The message box is shown when the user clicks on the password field */
            #message {
                display:none;
                
                color: #000;
                position: relative;
                padding: 5px;
                margin-top: 10px;
            }
            #message p {
                padding: 5px 15px;
                font-size: 12px;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var myInput = document.getElementById("psw");
                var length = document.getElementById("length");

                myInput.onfocus = function () {
                    document.getElementById("message").style.display = "block";
                }

                myInput.onblur = function () {
                    document.getElementById("message").style.display = "none";
                }
                $("#psw").on("keyup", function () {
                    // Validate length

                    if (myInput.value.length >= 8) {
                        length.classList.remove("invalid");
                        length.classList.add("valid");
                         //document.getElementById("message").style.display = "none";
                    } else {
                        length.classList.remove("valid");
                        length.classList.add("invalid");
                    }
                });
            });
        </script>

    </head>
    <body>

        <!--- <?php include 'nav.php'; ?>-->


        <div class="col-md-6 col-sm-6" id="div_login" style="margin-top: 50px">
            <form   id="form_client_login"  action="./pasta_sql/logar.php" method="get">
                <label>Cliente login</label>
                <legend style="border: 1px solid black"></legend>

                <input type="text" class="form-control" name="email" placeholder="Informe Seu Email"style="width: 45%;float: left">

                <input type="password" class="form-control" name="senha" placeholder="Informe Sua Senha"style="width: 50%;margin-left: 320px"
                       id="psw" placeholder="Informe Sua Senha"
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres" required>

                <input type="password" class="form-control" name="user" value="cliente" hidden>

                <br><input type="checkbox" > Lembra Senha 
                <div>
                    <a href="novo_cliente.php" class="btn btn-secondary" style="float:left;margin-left: 420px" id="bt_novo_cliente"> Novo Cliente</a> 
                    <input class="btn btn-secondary" style="float: right" id="bt-conectar_login" type="submit" value="Connectar" >
                </div>
            </form><br>
            <div id="message">
              
                <p id="length" class="invalid">A Senha deve ter: Minimum <b>8 characters</b></p>
            </div>
        </div>
        <br><br>
        <div class="footer">
            <?php include 'footer.php'; ?>

        </div>

    </body>
</html>
