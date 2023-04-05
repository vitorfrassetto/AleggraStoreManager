<?php

include('../../head.php');

$produto = $_POST['codigo'] ?? 0;
$venda = $_POST['codigoVenda'] ?? 0;
$qtdVenda = $_POST['quantidade'] ?? '';
$dataSaida = date("Y/m/d");

$queryValidacao = "SELECT * FROM vendas WHERE codigo_produto = " . $produto . " AND codigo_venda = " . $venda . " AND tipo_venda = 'CONDICIONAL'";
$resultValidacao = mysqli_query($conexao, $queryValidacao);
$rowValid = mysqli_fetch_assoc($resultValidacao);

if ($rowValid) {
  $qtdProdutoEstoque = $rowValid['quantidade_venda'];

  if ($qtdProdutoEstoque < $qtdVenda) {
    //Informa que o estoque esta sem saldo.

    echo "<script language='javascript' type='text/javascript'>
          alert('Quantidade de vendas informada menor que na condicional!');window.location.href='../../consulta.php';
        </script>";

    return false;
  }
  // Atualiza estoque da condicional
  $qtdSobra = $qtdProdutoEstoque - $qtdVenda;

  $queryUpdateCond = "UPDATE VENDAS SET quantidade_venda = 0 WHERE codigo_produto = " . $produto . " AND codigo_venda = " . $venda . " AND tipo_venda = 'CONDICIONAL'";
  $resultUpdateCond = mysqli_query($conexao, $queryUpdateCond);
  $queryUpdateProd = "UPDATE PRODUTOS SET quantidade_produto = quantidade_produto + " . $qtdSobra . " WHERE codigo_produto = " . $produto;
  $resultUpdateProd = mysqli_query($conexao, $queryUpdateProd);
}

$queryUpdateVenda = "SELECT * FROM vendas WHERE codigo_produto = " . $produto . " AND tipo_venda = 'VENDA'";
$resultUpdateVenda = mysqli_query($conexao, $queryUpdateVenda);
$RowUpdateVenda = mysqli_fetch_assoc($resultUpdateVenda);

if ($RowUpdateVenda) {
  // Se existir atualiza
  $queryAtualiza = "UPDATE vendas
  SET quantidade_venda = quantidade_venda + " . $qtdVenda . "
  WHERE codigo_produto= " . $produto . " AND tipo_venda = 'VENDA'";

  $result = mysqli_query($conexao, $queryAtualiza);

} else {

  $query = "INSERT INTO vendas (codigo_produto, quantidade_venda, tipo_venda, data_saida, venda_realizada) 
          VALUES ('$produto', '$qtdVenda', 'VENDA', '$dataSaida', 'S')";

  $result = mysqli_query($conexao, $query);
}

if ($result) {
  echo "<script language='javascript' type='text/javascript'>
        alert('Venda registrada com sucesso o restante dos produtos voltaram para o estoque!');window.location.href='../../consulta.php';
      </script>";
}