<?php

include('../../head.php');

$produto = $_POST['produto'] ?? '';
$modelo = $_POST['modelo'] ?? '';
$tecido = $_POST['tecido'] ?? '';
$cor = $_POST['cor'] ?? '';
$tamanho = $_POST['tamanho'] ?? '';
$quantidade = $_POST['quantidade'] ?? 0;
$valor = $_POST['valor'] ?? 0;


$querySeleciona = "SELECT * FROM produtos where descricao_produto = '" . $produto . "' 
                                                AND modelo_produto = '" . $modelo . "' 
                                                AND tecido_produto = '" . $tecido . "' 
                                                AND cor_produto = '" . $cor . "'
                                                AND tamanho_produto = '" . $tamanho . "'
                                                AND valor_produto = '" . $valor . "'";

$resultValidacao = mysqli_query($conexao, $querySeleciona);
$row = mysqli_fetch_assoc($resultValidacao);
if ($row) {

  $queryAtualiza = "UPDATE produtos
                    SET quantidade_produto= quantidade_produto + " . $quantidade . "
                    WHERE codigo_produto= " . $row['codigo_produto'];

  $result = mysqli_query($conexao, $queryAtualiza);

  if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Produto adicionado com sucesso');
      </script>";
  }
} else {
  $query = "INSERT INTO produtos (descricao_produto, modelo_produto, tecido_produto, cor_produto, tamanho_produto, quantidade_produto, valor_produto) 
            VALUES ('$produto', '$modelo', '$tecido', '$cor', '$tamanho', '$quantidade', '$valor')";
  //FIM 
  $result = mysqli_query($conexao, $query);

  if ($result) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Produto cadastrado com sucesso!');
    </script>";
  }
}

$queryRetorno= "SELECT * FROM produtos where descricao_produto = '" . $produto . "' 
                                                AND modelo_produto = '" . $modelo . "' 
                                                AND tecido_produto = '" . $tecido . "' 
                                                AND cor_produto = '" . $cor . "'
                                                AND tamanho_produto = '" . $tamanho . "'
                                                AND valor_produto = '" . $valor . "'";

$resultRetorno = mysqli_query($conexao, $queryRetorno);
$rowProduto = mysqli_fetch_assoc($resultRetorno);

$codigoProduto = $rowProduto['codigo_produto'];

?>

<script language='javascript' type='text/javascript'>
    window.location.href='../../cadastro.php?codigo=<?php echo $codigoProduto ?>';
</script>
