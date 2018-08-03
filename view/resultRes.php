<?php
session_start();
$con = new PDO("mysql:host=localhost;dbname=reservas_asser", "root", "123456");
$stmt = $con->prepare("INSERT INTO reserva(id_usuario, curso, datahj, horario, id_item, localizacao, obs) VALUES(?, ?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1,$_SESSION['id']);
$stmt->bindParam(2,$_SESSION['idcurso']);
$stmt->bindParam(3,$_SESSION['datahj']);
$stmt->bindParam(4,$_SESSION['horario']);
$stmt->bindParam(5,$_POST['mselect']);
$stmt->bindParam(6,$_POST['localizacao']);
$stmt->bindParam(7,$_POST['obs']);
$stmt->execute();
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
        <button class="w3-button" action="acesso.html">Home</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="prof.php" class="w3-bar-item w3-button">Início</a>
            <a href="#" class="w3-bar-item w3-button">---------</a>
            <a href="sair.php" class="w3-bar-item w3-button">Sair</a>
        </div>
    </div>

    <div class="w3-dropdown-hover">
        <button class="w3-button">Reserva</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="nvreserva.php" class="w3-bar-item w3-button">Nova reserva</a>
            <a href="cnlreserva.php" class="w3-bar-item w3-button">Cancelar reserva</a>
        </div>
    </div>

    <div class="w3-dropdown-hover">
        <button class="w3-button">Consultar</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="cnlreserva.php" class="w3-bar-item w3-button">Reservas realizadas</a>
        </div>
    </div>

    <div class="w3-dropdown-hover">
        <button class="w3-button">Atualizar</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="edtperfil.php" class="w3-bar-item w3-button">Perfil</a>
        </div>
    </div>


    <div class="w3-dropdown-hover">
        <button class="w3-button">Sobre</button>
        <div class="w3-dropdown-content w3-bar-block w3-border">
            <a href="#" class="w3-bar-item w3-button"><code>Web Design</code></a>
            <a href="#" class="w3-bar-item w3-button">Manual Sistema de Reservas</a>
        </div>
    </div>
</div>

<div class="w3-center">
    <div>
        <h4>Recurso reservado com sucesso!</h4>
        <?php
            $page = "prof.php";
            $sec = "2";
            header("Refresh: $sec; url=$page");
        ?>
    </div>
</div>

</body>
</html>
