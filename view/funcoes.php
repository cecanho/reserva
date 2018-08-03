<?php


    function listaItens(){

        foreach(getAllItem() as $row){
            $dados = $row['id'] . $row['nome'];
        }
        return $dados;
    }

    //Retorna item disponível
    function getItemId(){
        $dados = array();
        $i = 0;
        foreach(getAllItem() as $row){
            $dados[$i] = $row['id'];
            $i++;
        }
        return $dados;
    }

    function getIdItemReserva(){
        $dados = array();
        $i = 0;
        foreach(getAllReservas() as $row){
            $dados[$i] = $row['id_item'];
            $i++;
        }
        return $dados;
    }

    function getItemDisponivel(){
        $d1 = getItemId();
        $d2 = getIdItemReserva();
        $dados = array_diff($d1,$d2);
        return $dados;
    }

?>

