<?php

include('../../head.php');

$descricao = strtoupper($_POST['descricao']) ?? '';

$querySeleciona = "SELECT * FROM param_cores where descricao = '". $descricao ."'";

$resultValidacao = mysqli_query($conexao, $querySeleciona);
$row = mysqli_fetch_assoc($resultValidacao);
if ($row) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Cor já está cadastrado');window.location.href='../../parametros/cores.php';
        </script>";
} else {
    $query = "INSERT INTO param_cores (descricao) 
            VALUES ('$descricao')";

    $result = mysqli_query($conexao, $query);

    if ($result) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Cor cadastrada com sucesso!');window.location.href='../../parametros/listaCores.php';
    </script>";
    }
}