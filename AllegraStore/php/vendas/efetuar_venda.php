<?php

include('../../head.php');

$produto = $_POST['codigo'] ?? 0;
$qtdVenda = $_POST['quantidade'] ?? '';
$dataSaida = date("Y/m/d");

$queryValidacao = "SELECT codigo_produto, quantidade_produto FROM produtos WHERE codigo_produto = " . $produto;
$resultValidacao = mysqli_query($conexao, $queryValidacao);

while ($rowValid = mysqli_fetch_assoc($resultValidacao)) {
  $qtdProdutoEstoque = $rowValid['quantidade_produto'];

  if ($qtdProdutoEstoque < $qtdVenda) {
    //Informa que o estoque esta sem saldo.

    echo "<script language='javascript' type='text/javascript'>
          alert('Sem estoque para este produto!');window.location.href='../../venda.php';
        </script>";

    return false;
  }

  //Atualiza no estoque a quantidade vendida do produto
  $qtdNova = $qtdProdutoEstoque - $qtdVenda;

  $queryUpdateProd = "UPDATE produtos SET quantidade_produto = '$qtdNova' WHERE codigo_produto = $produto";
  $resultUpdateProd = mysqli_query($conexao, $queryUpdateProd);
}
$queryUpdateVenda = "SELECT * FROM vendas WHERE codigo_produto = " . $produto . " AND tipo_venda = 'VENDA'";
$resultUpdateVenda = mysqli_query($conexao, $queryUpdateVenda);
$RowUpdateVenda = mysqli_fetch_assoc($resultUpdateVenda);

if ($RowUpdateVenda) {
  // Se existir atualiza
  $queryAtualiza = "UPDATE vendas
  SET quantidade_venda= quantidade_venda + " . $qtdVenda . "
  WHERE codigo_produto= " . $produto . " AND tipo_venda = 'VENDA'";

  $result = mysqli_query($conexao, $queryAtualiza);

} else {

  $query = "INSERT INTO vendas (codigo_produto, quantidade_venda, tipo_venda, data_saida, venda_realizada) 
          VALUES ('$produto', '$qtdVenda', 'VENDA', '$dataSaida', 'S')";

  $result = mysqli_query($conexao, $query);
}
if ($result) {
  echo "<script language='javascript' type='text/javascript'>
        alert('Venda registrada com sucesso!');window.location.href='../../venda.php';
      </script>";
}