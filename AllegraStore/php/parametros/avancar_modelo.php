<?php

include('../../head.php');

$descricao = strtoupper($_POST['descricao']) ?? '';

$querySeleciona = "SELECT * FROM param_modelos where descricao = '". $descricao ."'";

$resultValidacao = mysqli_query($conexao, $querySeleciona);
$row = mysqli_fetch_assoc($resultValidacao);
if ($row) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Modelo já está cadastrado');window.location.href='../../parametros/modelos.php';
        </script>";
} else {
    $query = "INSERT INTO param_modelos (descricao) 
            VALUES ('$descricao')";

    $result = mysqli_query($conexao, $query);

    if ($result) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Modelo cadastrado com sucesso!');window.location.href='../../parametros/listaModelos.php';
    </script>";
    }
}