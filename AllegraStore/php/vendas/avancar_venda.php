<?php

include('../../head.php');

$codigo = $_POST['codigo'] ?? '';

header("Location: ../../venda_registrar.php?cod_prod_venda=$codigo");

?>