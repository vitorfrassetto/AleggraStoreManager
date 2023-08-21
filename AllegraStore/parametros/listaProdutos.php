<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require 'head.php' ?>
</head>

<body class="tudo">
    <header class="cabecalho">
        <section>
            <a href="../index.html" target="_self">
                <img class="logo" src="../img/logo.png" alt="logo">
            </a>
        </section>
    </header>

    <main class="mainEstoque">
    <?php
        $query = "SELECT * FROM param_produtos ";

        $registros = mysqli_query($conexao, $query);

        ?>
        <section class="tituloConsulta">
            <h2>Produtos</h2>
        </section>
            <article class="cadastrar">
                <a href="produtos.php" class="btnCadastrar">Cadastrar produto</a>
                <a href="../parametros.html" class="btnCadastrar">Voltar</a>
            </article>
            <article class="listaEstoque" style="margin-top: 20px;">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th style="width: 160px;" class="text-center" scope="col">Código</th>
                            <th style="width: 700px;" scope="col">Produto</th>
                            <th style="width: 60px;" class="text-center" scope="col">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($registros)) {
                            $codigo = $row['codigo'];
                            $descricao = $row['descricao'];

                            ?>
                            <tr class="odd gradeX">
                                <td class="text-center vertical-custom">
                                    <?= $codigo; ?>
                                </td>
                                <td class="text-left vertical-custom">
                                    <?= $descricao; ?>
                                </td>
                                <td class="text-center vertical-custom">
                                    <a href = "../php/parametros/excluir.php?descricao=<?= $descricao ?>&tabela=param_produtos&lista=listaProdutos&codigo=<?= $codigo ?>" class="btn btn-exluir btn-danger" type="button">X</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </article>
        </section>
    </main>

</body>

</html>