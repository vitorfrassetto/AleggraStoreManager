<?php

include('../../head.php');

$codigo = $_GET['cod_produto'];
?>
<script language='javascript' type='text/javascript'>
        <?php
        $query = "UPDATE produtos SET quantidade_produto = 0 WHERE codigo_produto = " . $codigo;
        $resultValidacao = mysqli_query($conexao, $query);
        ?>
        alert('Produto ' + <?php echo $codigo ?> + ' excluído com sucesso!');
        window.location.href = '../../estoque.php'
</script>