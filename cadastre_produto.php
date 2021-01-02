<html>
    <head>

        <?php
        include 'head.php';
        include './pasta_sql/conexao.php';
        $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
        $cod_produt = isset($_GET['cod_pro'])? $_GET['cod_pro'] : '';
        $ed_nome_produt = "";
        $ed_tamanho = "";
        $ed_valor = "";
        $ed_detail = "";

        if ($acao == "editar") {
            $conn = OpenCon();
            $result_d = mysqli_query($conn, "SELECT id_produto, nome_produto,tamanho,preco, detail FROM produto  WHERE id_produto = '$cod_produt'");
            if (!$result_d) {
                echo "<script>alert('Cod Produto Nao Foi Achado!');document.location='cadastre_produto.php';</script>";
                die(" ");
            }
            while ($dados_d = mysqli_fetch_array($result_d)) {

                $ed_nome_produt = $dados_d['nome_produto'];
                $ed_tamanho = $dados_d['tamanho'];
                $ed_valor = $dados_d['preco'];
                $ed_detail = $dados_d['detail'];
            }
        }
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
               $("#bt_cadast_produto").on("click",function() {
                    
                    var nome_produto = $("#nome_produto").val();
                    var e = document.getElementById("select_tamanho");
                    var tamanho  = e.options[e.selectedIndex].value;
                    var preco = $("#preco").val();
                    var detail = $("#descricao_protudo").val();
                    var xhttp;
                    xhttp = new XMLHttpRequest();
                    xhttp.open("GET", "http://localhost/Trabalho_Liguagem_4/pasta_sql/Produto_Cadastrado.php?nome_pro=" + nome_produto + "&tamanho= " + tamanho + "&preco=" + preco + "&detail=" + detail, true);
                    xhttp.send("");
                    xhttp.onreadystatechange = function () {
                        if (this.readyState === 4 && this.status === 200) {
                            alert('produto foi cadastrado com sucesso');
                            var url = "http://localhost/Trabalho_Liguagem_4/tabela_produto.php";
                            window.location = url;
                        }
                    };

                });
                $("#bt_cancel_cadast_produt").on("click",function (){
                    var url = "http://localhost/Trabalho_Liguagem_4/tabela_produto.php";
                     window.location = url;
                });
                
                $("#bt_disconect").on("click",function (){
                    var url = "http://localhost/Trabalho_Liguagem_4/index.php";
                     window.location = url;
                });
                
                $("#update_produt").on("click",function (){
                    var id_produto = $("#identificatio_produto").val();
                    
                    var nome_produto = $("#nome_produto").val();
                    var e = document.getElementById("select_tamanho");
                    var tamanho  = e.options[e.selectedIndex].value;
                    var preco = $("#preco").val();
                    var detail = $("#descricao_protudo").val();
                    var xhttp;
                    xhttp = new XMLHttpRequest();
                    xhttp.open("GET", "http://localhost/Trabalho_Liguagem_4/pasta_sql/Update_produto.php?id_pro=" + id_produto +"&nome_pro=" + nome_produto + "&tamanho= " + tamanho + "&preco=" + preco + "&detail=" + detail, true);
                    xhttp.send("");
                    xhttp.onreadystatechange = function () {
                        if (this.readyState === 4 && this.status === 200) {
                            //alert('produto foi cadastrado com sucesso');
                           var url = "http://localhost/Trabalho_Liguagem_4/tabela_produto.php";
                            window.location = url;
                        }
                    };
                });
            });
        </script>
    </head>
    <body>

        <button  id="bt_disconect" class="btn btn-danger" style="float: right;margin-right: 150px;margin-top: 10px;">Cancel</button><br>
        <div id="div_pri_produto">
           
            
            <div class="col-md-6 " id="div_imag" style="position: relative">
                <span>
                    <img src="images/icon_principal.jpg" class="rounded-circle" id="img_produto_cadastrado" >
                </span>
            </div>

            <div class="col-md-6" id="div_bt_carrega_imag" style="position: relative">
                <button  id="btn_carregar_image">caregar image</button>
            </div>

            <br><br><center>
                <div style="position: relative">
                    <?php 
                    echo'
                    <input type="text" class="form-control" placeholder="Nome produto"value="'.$ed_nome_produt.'"  id="nome_produto" style="margin: 15px;">
                    <input type="text" value="'.$cod_produt.'" id="identificatio_produto" hidden> 
                    ';?>           
                </div>

                <div class="col-md-9" id="div_select" style="position: relative">

                    <p style="margin: 0px">Tamanho : </p>
                    <select class="form-control"  id="select_tamanho">
                        <option>Select...</option>
                        <option value="M" >M</option>
                        <option value="G">G</option>
                        <option value="P">P</option>
                    </select>
                </div>
                <br>

                <div style="position: relative">
                    <?php
                     echo'<input type="text" class="form-control" value="'.$ed_valor.'" placeholder="Preço" id="preco">
                    <legend></legend>';
                    ?>
                </div>

                <div style="margin-left: 20px">
                    <div class="col-md-6">
                        <label>Details</label>
                        <?php
                         echo'<textarea class="form-control" style="width: 100%" id="descricao_protudo" value="'.$ed_detail.'">'.$ed_detail.'</textarea>';
                    ?></div><br>

                    <div class="col-md-6">
                       <?php
                        echo' <button id="bt_cadast_produto"';if($acao =="editar")echo 'disabled';echo'>Cadastre</button>
                        <button  id="bt_cancel_cadast_produt">Cancel</button>
                        <input type="button" name="cod_dis" value="Update" id="update_produt"';if(!$acao =="editar")echo 'disabled';echo '><br><br>';
                        ?>    
                    </div>
                </div></center>
        </div>
        <div class="footer">

        </div>

    </body>


</html>


