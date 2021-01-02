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

                var myInput = document.getElementById("confirme_senha");
                var myInput2 = document.getElementById("senha");
                var length = document.getElementById("length");

                myInput.onfocus = function () {
                    document.getElementById("message").style.display = "block";
                }
                myInput2.onfocus = function () {
                    document.getElementById("message").style.display = "block";
                }
                myInput.onblur = function () {
                    document.getElementById("message").style.display = "none";
                    var senha = $("#senha").val();
                    var confime_senha = $("#confirme_senha").val();
                     if (confime_senha !== "" && senha !== "") {
                        if (confime_senha === senha) {
                            //alert(confime_senha +" bi "+senha);
                        } else {
                            alert('Senha nao combinem');
                        }
                    }else{
                        
                    }
                };
                
                myInput2.onblur = function () {
                    document.getElementById("message").style.display = "none";
                };
                
                $("#confirme_senha").on("keyup", function () {
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
                $("#senha").on("keyup", function () {
                    // Validate length

                    if (myInput2.value.length >= 8) {
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


        <div class="col-md-6 col-sm-6" id="div_cadastre_novo_cliente">
            <form  action="proximo.php" method="post" id="form_cadast_novo_client">
                <label>Novo Cliente</label>
                <legend style="border: 1px solid black"></legend>

                <input type="text" class="form-control" name="email" placeholder="Informe Seu Email" id="email_cadast_novo_cliente">
                <legend></legend>
                <input type="password" class="form-control"  name="senha" id="senha"  placeholder="Informe Sua Senha"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres" required>
                <legend></legend>
                <input type="password" class="form-control" id="confirme_senha"  placeholder="Informe Sua Senha"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres" required>
                <legend></legend>
                <br><input type="checkbox" > Lembra Senha 
                <div>
                    <input type="submit" class="btn btn-secondary" style="float: left;margin-left: 480px" value="Proximo">  
                    <a href="cliente_login.php" class="btn btn-secondary" style="float: right" > Cancela</a>
                </div>
            </form>
            <div id="message">
                <p id="length" class="invalid">A Senha deve ter: Minimum <b>8 characters</b></p>
            </div>            

    </body>
</html>
