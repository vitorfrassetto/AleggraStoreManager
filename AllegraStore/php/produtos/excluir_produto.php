<?php

include('../../head.php');

$codigo = $_GET['cod_produto'];
?>
<script language='javascript' type='text/javascript'>
    var resultado = confirm('Deseja realmente excluir o item: ' + <?php echo $codigo ?> + " ?");
    if (resultado == true) {
        <?php
        $query = "UPDATE produtos SET quantidade_produto = 0 WHERE codigo_produto = " . $codigo;
        $resultValidacao = mysqli_query($conexao, $query);
        ?>
        alert('Produto ' + <?php echo $codigo ?> + ' excluido!');
        window.location.href = '../../estoque.php'
    }
    else {
        window.location.href = '../../estoque.php'
    }
</script>