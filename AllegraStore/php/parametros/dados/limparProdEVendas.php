<?php
include('../../../head.php');

if (isset($_POST['confirmar'])) {
    // Lista de tabelas que você deseja limpar
    $tabelas = array("vendas", "produtos");

    foreach ($tabelas as $tabela) {
        $queryDelete = "DELETE FROM $tabela";
        $resultDelete = mysqli_query($conexao, $queryDelete);

        if (!$resultDelete) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Ocorreu um erro ao excluir os dados da tabela $tabela.');
            window.location.href='../../parametros/dados.php';
            </script>";
            exit(); // Sai do loop se ocorrer um erro em alguma tabela
        }

        $queryResetAutoIncrement = "ALTER TABLE $tabela AUTO_INCREMENT = 1";
        $resultResetAutoIncrement = mysqli_query($conexao, $queryResetAutoIncrement);
    }



    echo "<script language='javascript' type='text/javascript'>
        alert('Todos produtos e vendas cadastrados foram excluídos com sucesso!');
        window.location.href='../../../parametros/dados.php';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Dados</title>
    <style>
        .corpo {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #d0b196;
        }

        .container {
            flex-direction: column;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            width: auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .corpo form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .corpo input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .corpo a {
            margin-top: 10px;
            text-decoration: none;
        }
    </style>

</head>

<body class="corpo">
    <div class="container">
        <h1>Excluir Dados das Tabelas</h1>
        <p>Tem certeza de que deseja excluir todos os produtos e vendas das tabelas?</p>
        <form method="post">
            <input type="submit" name="confirmar" value="Confirmar">
            <a href="../../../parametros/dados.php">Cancelar</a>
        </form>
    </div>
</body>

</html>