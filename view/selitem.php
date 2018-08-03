<?php
session_start();$con = new PDO("mysql:host=localhost;dbname=reservas_asser", "root", "123456");
$rs = $con->query('SELECT * FROM item WHERE id NOT IN (SELECT id_item FROM reserva WHERE datahj = "'.$_POST['datares'].'"ORDER BY id DESC)');

    $_SESSION['horario'] = $_POST['horario'];
    $_SESSION['datahj'] = $_POST['datares'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Acessso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <!--jQuery
    <script src="https://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
    <!--Script-->
    <script src="script.js" type="text/javascript"></script>
</head>
<body onload="carregarItens()">
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
    <form name="frm" method="post" action="resultRes.php">
        <div>
            <h4>Escolha um recurso:</h4>
            <select id="mselect" name="mselect">
                <?php
                while($row = $rs->fetch(PDO::FETCH_OBJ))
                    {
                        echo "<option value='" . $row->id . "'>" . $row->nome . "</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <h4>Escreva o local onde deve ser instalado o equipamento:</h4>
            <input type="text" id="localizacao" name="localizacao">
        </div>
        <div>
            <h4>Observações:</h4>
            <input type="text" id="obs" name="obs">
        </div>
        <br />
        <input type="submit" name="next" id="next" value="Próximo">
    </form>
</div>

</body>
</html>
