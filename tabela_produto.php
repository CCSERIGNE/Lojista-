<html>
    <head>
        <?php
        include('head.php');
        include './pasta_sql/conexao.php';
        $result = seleciona_produtos();
        $acao = isset($_GET['acao'])?$_GET['acao'] : '';
        $cod_produt = isset($_GET['cod_produt'])? $_GET['cod_produt'] : '';
        if($acao == "deletar"){
            deletar_produto($cod_produt);
        }
   
        ?>
    </head>
    <body>


    <center>
        <table class="table col-md-8" id="tabela_produto">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Identifição</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Tamanho</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Opção</th>
                </tr>
            </thead>
            <tbody>
<?php
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>
            <th scope="row">' . $row["id_produto"] . '</th>
            <td>' . $row["nome_produto"] . '</td>
            <td>' . $row['tamanho'] . '</td>
            <td>' . $row["preco"] . '</td>
            <td>
            <a href="cadastre_produto.php?acao=editar&cod_pro='.$row["id_produto"].'" type="button"  class="btn btn-primary btn-sm" style="background-color:yelow" ><i class="glyphicon glyphicon-edit"> Edita</a></i>
            <a href="tabela_produto.php?acao=deletar&cod_produt='.$row["id_produto"].'" type="button"  class="btn btn-primary btn-sm" style="background-color:red"><i class="glyphicon glyphicon-delet"> Deleta</a></i>
            </td>    
        </tr>';
}
?>
            </tbody>
        </table>

    </center>       

    <br><br>
    <div class="footer">

<?php include 'footer.php'; ?>       
    </div>

</body>
</html>
