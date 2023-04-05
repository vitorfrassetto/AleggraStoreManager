<?php

include('../../head.php');

$produto = $_POST['produto'] ?? '';
$modelo = $_POST['modelo'] ?? '';
$tecido = $_POST['tecido'] ?? '';
$cor = $_POST['cor'] ?? '';
$tamanho = $_POST['tamanho'] ?? '';
$quantidade = $_POST['quantidade'] ?? 0;


$querySeleciona = "SELECT * FROM produtos where descricao_produto = '" . $produto . "' 
                                                AND modelo_produto = '" . $modelo . "' 
                                                AND tecido_produto = '" . $tecido . "' 
                                                AND cor_produto = '" . $cor . "'
                                                AND tamanho_produto = '" . $tamanho . "'";


$resultValidacao = mysqli_query($conexao, $querySeleciona);
$row = mysqli_fetch_assoc($resultValidacao);
if ($row) {

  $queryAtualiza = "UPDATE produtos
                    SET quantidade_produto= quantidade_produto + " . $quantidade . "
                    WHERE codigo_produto= " . $row['codigo_produto'];

  $result = mysqli_query($conexao, $queryAtualiza);

  if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Produto adicionado com sucesso');window.location.href='../../cadastro.html';
      </script>";
  }
} else {
  $query = "INSERT INTO produtos (descricao_produto, modelo_produto, tecido_produto, cor_produto, tamanho_produto, quantidade_produto) 
            VALUES ('$produto', '$modelo', '$tecido', '$cor', '$tamanho', '$quantidade')";
  //FIM 
  $result = mysqli_query($conexao, $query);

  if ($result) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Produto cadastrado com sucesso!');window.location.href='../../cadastro.html';
    </script>";
  }
}