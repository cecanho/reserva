<?php
$con = new PDO("mysql:host=localhost;dbname=reserva", "", "");
$rs = $con->query('SELECT * FROM reserva WHERE id_usuario = '.$_COOKIE['id'].' ORDER BY id desc LIMIT 5;');
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
            <a href="cancreserva.php" class="w3-bar-item w3-button">Cancelar reserva</a>
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
    <form name="frmatua" method="post" action="profremoveres.php">
        <h3>Reservas Realizadas</h3>
        <h5><code>Marque o recurso que deseja cancelar e clique no botão <strong>X</strong>.</code></h5>
        <div id="meudiv">
            <table class="w3-table-all">
                <tr>
                    <th> * </th>
                    <th>ID</th>
                    <th>ID_ITEM</th>
                    <th>DATA</th>
                    <th>HORA</th>
                    <th></th>
                </tr>
                <?php
                while($row = $rs->fetch(PDO::FETCH_OBJ)) {
                    echo '<tr>';
                    echo '<td><input type="radio" name="id" value="'.$row->id.'"></td>';
                    echo '<td>' . $row->id . '</td>';
                    echo '<td>' . $row->id_item . '</td>';
                    echo '<td>' . $row->datahj . '</td>';
                    echo '<td>' . $row->horario . '</td>';
                    echo '<td><input type="submit" name="remover" value="Remover"></td>';
                    echo '</tr>';
                }
                ?>
            </table>
    </form>
    </div>
</div>

</body>
</html>
