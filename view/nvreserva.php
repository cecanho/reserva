<?php
session_start();$con = new PDO("mysql:host=localhost;dbname=reservas_asser", "root", "123456");
$rs = $con->query('SELECT horario FROM horario');

function SomarData($data, $dias, $meses, $ano)
{
    /*www.brunogross.com*/
    //passe a data no formato dd/mm/yyyy
$data = explode("/", $data);
   $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses,
       $data[0] + $dias, $data[2] + $ano) );
   return $newData;
}
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
    <form name="frm" method="post" action="selitem.php">
        <div>
        <h4>Escolha uma data:</h4>
        <select id="datares" name="datares">
            <?php
            $data = date('d/m/Y');
            for($i=0;$i<3;$i++){
                $newData = SomarData($data,$i);
                echo '<option value="' . $newData . '">' . $newData . '</option>';
            }
            ?>
        </select>
        </div>
        <div>
        <h4>Escolha um horário:</h4>
        <select id="horario" name="horario">
            <?php
                while($row = $rs->fetch(PDO::FETCH_OBJ)){
                    echo '<option value="' . $row->horario . '">' . $row->horario . '</option>';
                }
            ?>
        </select>
        </div>
        <br /><br />
        <input type="submit" name="next" id="next" value="Próximo">
    </form>
</div>

</body>
</html>
