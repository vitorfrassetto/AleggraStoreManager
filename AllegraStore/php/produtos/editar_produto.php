<?php

include('../../head.php');

$codigo = $_POST['codigo'] ?? '';
$quantidade = $_POST['quantidade'] ?? 0;
$valor = $_POST['valor'] ?? 0;

$queryAtualiza = "UPDATE produtos
                  SET quantidade_produto = " . $quantidade . ",
                      valor_produto = " . $valor . "
                  WHERE codigo_produto = " . $codigo;

$result = mysqli_query($conexao, $queryAtualiza);

if ($result) {
    echo "<script language='javascript' type='text/javascript'>
        alert('Produto atualizado com sucesso');
        window.location.href = '../../estoque.php'; 
    </script>";
} else {
    echo "Erro ao atualizar produto: " . mysqli_error($conexao);
}

?>
