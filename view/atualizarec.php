<?php
session_start();
$con = new PDO("mysql:host=localhost;dbname=reservas_asser", "root", "123456");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Acessso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="w3-center">
    <div class="w3-dropdown-hover">
        <button class="w3-button" action="acesso.html"><img src="img/logo.png" width="50"></button>
    </div>

    <div class="w3-dropdown-hover">
        <button class="w3-button">Home</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="admin.php" class="w3-bar-item w3-button">Início</a>
            <a href="#" class="w3-bar-item w3-button">---------</a>
            <a href="sair.php" class="w3-bar-item w3-button">Sair</a>
        </div>
    </div>

    <div class="w3-dropdown-hover">
        <button class="w3-button">Cadastrar</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="admcadusu.php" class="w3-bar-item w3-button">Usuario</a>
            <a href="admcadrec.php" class="w3-bar-item w3-button">Recurso</a>
            <a href="admcadhor.php" class="w3-bar-item w3-button">Horario</a>
            <a href="admcadcur.php" class="w3-bar-item w3-button">Curso</a>
        </div>
    </div>

    <div class="w3-dropdown-hover">
        <button class="w3-button">Consultar</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="admconusu.php" class="w3-bar-item w3-button">Usuario</a>
            <a href="admconrec.php" class="w3-bar-item w3-button">Recurso</a>
            <a href="admconhor.php" class="w3-bar-item w3-button">Horario</a>
            <a href="admconcur.php" class="w3-bar-item w3-button">Curso</a>
            <a href="relacaodiario.php" class="w3-bar-item w3-button">Tabela com Recursos locados</a>
        </div>
    </div>

    <div class="w3-dropdown-hover">
        <button class="w3-button">Atualizar</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="admatualizausu.php" class="w3-bar-item w3-button">Usuario</a>
            <a href="admautalizarec.php" class="w3-bar-item w3-button">Recurso</a>
            <a href="admatualizahor.php" class="w3-bar-item w3-button">Horario</a>
            <a href="admatualizacur.php" class="w3-bar-item w3-button">Curso</a>
        </div>
    </div>

    <div class="w3-dropdown-hover">
        <button class="w3-button">Remover</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="admremusu.php" class="w3-bar-item w3-button">Usuario</a>
            <a href="admremrec.php" class="w3-bar-item w3-button">Recurso</a>
            <a href="admremhor.php" class="w3-bar-item w3-button">Horario</a>
            <a href="admremcur.php" class="w3-bar-item w3-button">Curso</a>
        </div>
    </div>

    <div class="w3-dropdown-hover">
        <button class="w3-button">Sobre</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="#webdesign.html" class="w3-bar-item w3-button"><code>Web Design</code></a>
            <a href="manual.pdf" class="w3-bar-item w3-button">Manual Sistema de Reservas</a>
        </div>
    </div>
</div>

<div class="w3-center">
    <h1>Atualização de Recursos</h1>
    <div id="meudiv">
    <form method="post" action="atualizarrec.php">
        <input type="hidden" name="id" value="<?php echo $_POST['id'];?>"></div><br>
        <?php
        $rs = $con->prepare('SELECT * FROM item WHERE id = ?');
        $rs->bindParam(1, $_POST['id']);
        if($rs->execute()){
            if($rs->rowCount() > 0){
                while($row = $rs->fetch(PDO::FETCH_OBJ)){
                    echo '<div><label>Nome:</label></div>';
                    echo '<div><input type="text" name="nome" id="nome" value="'.$row->nome.'"></div>';
                    echo '<div><label>Descrição:</label></div>';
                    echo '<div><input type="text" name="descricao" id="descricao" value="'.$row->descricao.'"></div>';
                }
            }
        }
        ?>
         <input type="submit" value="Atualizar" id="atualizar" name="atualizar">
    </form></div>
</div>

</body>
</html>
