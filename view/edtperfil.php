<?php
$con = new PDO("mysql:host=localhost;dbname=reserva", "", "");
$rs = $con->query('SELECT * FROM curso');
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
    <h3>Editar Perfil</h3>
    <form method="post" action="atualizaperfil.php">
        <div><label>Login:</label></div>
        <div><input type="text" name="login" id="login" value="<?php echo $_COOKIE['login'];?>"></div><br>
        <div><label>Nome:</label></div>
        <div><input type="text" name="nome" id="nome" value="<?php echo $_COOKIE['nome'];?>"></div><br>
        <div><label>Curso:</label></div>
        <div>
            <select name="idCurso" id="idCurso">
                <?php
                while($row = $rs->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $row->id . '">' . $row->nome . '</option>';
                }
                ?>
            </select>
        </div>
        <div><input type="hidden" name="validar" id="validar" value="1"></div><br>
        <div><label>Senha:</label></div>
        <div><input type="password" name="senha" id="senha" value="<?php echo $_COOKIE['senha'];?>"></div><br>
        <input type="submit" value="Atualizar Perfil" id="atualizrar" name="atualizar">
    </form>

</div>

</body>
</html>
