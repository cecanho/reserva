<?php
session_start();
$con = new PDO("mysql:host=localhost;dbname=reservas_asser", "root", "123456");

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

                    $_SESSION['id'] = $id;
                    $_SESSION['login'] = $login;
                    $_SESSION['idcurso'] = $idCurso;
                    $_SESSION['nome'] = $nome;
                    $_SESSION['validar'] = $validar;
                    $_SESSION['dtalteracao'] = date('d/m/Y');
                    $_SESSION['hora'] = date('h:i:s');

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






