<?php

include('../../head.php');

$codigo = $_GET['codigo'];
$descricao = $_GET['descricao'];
$tabela = $_GET['tabela'];
$lista = $_GET['lista'];
?>

<script language='javascript' type='text/javascript'>
        <?php
        $query = "DELETE FROM ". $tabela ." WHERE codigo = " . $codigo;
        $resultValidacao = mysqli_query($conexao, $query);
        ?>
        alert('Item <?php echo $descricao ?> excluído com sucesso!');
        window.location.href = '../../parametros/<?php echo $lista ?>.php'
</script>