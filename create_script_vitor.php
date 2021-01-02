<!-- create.blade.php -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Language" content="pt-br">

    <br>
    <title>Cadastro</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "BD_linguagem_IV";
    //abre conexão mysql
    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
    $id_oferta_disciplina = "";
    echo '<script type="text/script">'
    . '$(document)ready(function(){'
    . '  $("#chekbox").on("click",function(){'
    . '"' . $id_oferta_disciplina . '" = $(this).val();';
    $query = mysqli_query($link, "SELECT COUNT(id_aluno),sl.capacidade 
       FROM inscricao as ins
       JOIN oferta_disciplina as ofd ON ofd.id = ins.id_oferta_disciplina
       JOIN disciplina as d ON d.id = ofd.id_disciplina
       JOIN aula as a on a.id_oferta_disciplina = ofd.id
       JOIN sala as sl on sl.id = a.id_sala
       WHERE ins.id_oferta_disciplina ='.$id_oferta_disciplina.'");
    while ($row = mysql_fetch_array($query)) {
        if ($row['COUNT(id_aluno)'] == $row['capacidade']) {
            echo "var modal = document.getElementById('myModal')";
            echo 'modal.style.display = "block"';
        }
    }

    echo '}) }) </script>';
?>   

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Sistema Academico</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="">Página Inicial <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="/">Realizar Inscrição</a>
            <a class="nav-item nav-link" href="/cancelar">Cancelar Inscrição</a>
        </div>
    </div>
</nav>

<div style="margin-bottom: 20px">
    <h2 style="text-align: center; margin-bottom: 50px;">Realizar Inscrição</h2>
    <form action="{{ route('inscricao.create') }}" method="POST" autocomplete="off">

        @csrf

        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Turma</th>
                    <th>Disciplina</th>
                    <th>Professor</th>
                    <th>Horários</th>
                    <th>Locais</th>            
                </tr>
            </thead>
            <tbody>

                @foreach($ofertas as $oferta)
                <tr>
                    <td><input type="checkbox" id="chekbox" name="id_turma[]" value="{{$oferta['id']}}"></td>          
                    <td>{{$oferta['codigo_turma']}}</td>
                    <td>{{$oferta['nome_disciplina']}}</td>
                    <td>{{$oferta['professor']}}</td>
                    <td>{{$oferta['horarioInicial']}} às {{$oferta['horarioFinal']}}</td>
                    <td>{{$oferta['sala_numero']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Realizar Inscrição</button>
        </div>

    </form>
</div>

    <div class="modal" id="mymodal" tabindex="-1" role="dialog" style="display: none">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Deseja se Escreve na lista de espera !.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="confirme" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://lib.arvancloud.com/ar/jquery.mask/1.14.9/jquery.mask.js"></script>

</body>
</html>