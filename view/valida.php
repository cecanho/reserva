<?php
$con = new PDO("mysql:host=localhost;dbname=reserva", "", "");

    $login = addslashes($_POST['login']);
    $senha = addslashes($_POST['senha']);

    $rs = $con->prepare('SELECT * FROM usuario WHERE login like ?');
    $rs->bindParam(1, $login);

    if($rs->execute()){
        if($rs->rowCount() > 0){
            while($row = $rs->fetch(PDO::FETCH_OBJ))
            {
                $mlogin = $row->login;
                $msenha = $row->senha;
                $id = $row->id;
                $idCurso = $row->id_curso;
                $nome = $row->nome;
                $validar = $row->validar;
                $dtalteracao = $row->dt_alteracao;
            }
        }
    }

    if(!isset($mlogin))
    {
        echo "login inválido";
    }else {

        if (strcmp($login, $mlogin) == 0) {
            if (strcmp($senha, $msenha) == 0) {
                if($validar==0){
                    echo "Conta Expirada";
                    $page = "login.html";
                    $sec = "3";
                    header("Refresh: $sec; url=$page");
                }else {
                    date_default_timezone_set('America/Sao_Paulo');
                    setcookie('id',$id,time() + (86400 * 30), "/");
                    setcookie('login',$login,time() + (86400 * 30), "/");
                    setcookie('idcurso', $idCurso,time() + (86400 * 30), "/");
                    setcookie('nome', $nome,time() + (86400 * 30), "/");
                    setcookie('validar', $validar,time() + (86400 * 30), "/");
                    setcookie('dtalteracao', date('d/m/Y'),time() + (86400 * 30), "/");
                    setcookie('hora', date('h:i:s'),time() + (86400 * 30), "/");

                    if(strcmp($login,"admin")==0){
                        header("Location: ../view/admin.php");
                    }else{
                        header("Location: ../view/prof.php");
                    }
                }
            } else {
                echo "login, ou senha inválido";
                $page = "../view/login.html";
                $sec = "5";
                header("Refresh: $sec; url=$page");
            }
        } else {
            echo "login, ou senha inválido";
            $page = "../view/login.html";
            $sec = "5";
            header("Refresh: $sec; url=$page");
        }
    }






