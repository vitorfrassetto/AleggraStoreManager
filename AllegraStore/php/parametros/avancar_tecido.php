<?php

include('../../head.php');

$descricao = strtoupper($_POST['descricao']) ?? '';

$querySeleciona = "SELECT * FROM param_tecidos where descricao = '". $descricao ."'";

$resultValidacao = mysqli_query($conexao, $querySeleciona);
$row = mysqli_fetch_assoc($resultValidacao);
if ($row) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Tecido já está cadastrado');window.location.href='../../parametros/tecidos.php';
        </script>";
} else {
    $query = "INSERT INTO param_tecidos (descricao) 
            VALUES ('$descricao')";

    $result = mysqli_query($conexao, $query);

    if ($result) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Tecido cadastrado com sucesso!');window.location.href='../../parametros/listaTecidos.php';
    </script>";
    }
}