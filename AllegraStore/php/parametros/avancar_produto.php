<?php

include('../../head.php');

$descricao = strtoupper($_POST['descricao']) ?? '';

$querySeleciona = "SELECT * FROM param_produtos where descricao = '". $descricao ."'";

$resultValidacao = mysqli_query($conexao, $querySeleciona);
$row = mysqli_fetch_assoc($resultValidacao);
if ($row) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Produto já está cadastrado');window.location.href='../../parametros/produtos.php';
        </script>";
} else {
    $query = "INSERT INTO param_produtos (descricao) 
            VALUES ('$descricao')";

    $result = mysqli_query($conexao, $query);

    if ($result) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Produto cadastrado com sucesso!');window.location.href='../../parametros/listaProdutos.php';
    </script>";
    }
}