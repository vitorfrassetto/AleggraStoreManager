<?php

include('../../head.php');

$codigo = $_POST['codigo'] ?? '';

header("Location: ../../saida_registrar.php?cod_prod_saida=$codigo");

?>