<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require 'head.php' ?>
</head>

<body class="tudo">
    <header class="cabecalho">
        <section>
            <a href="index.html" target="_self">
                <img class="logo" src="img/logo.png" alt="logo">
            </a>
        </section>
    </header>

    <main class="mainEstoque">
        <?php
        $queryProduto = "SELECT * FROM param_produtos ";
        $registrosProduto = mysqli_query($conexao, $queryProduto);

        $queryModelo = "SELECT * FROM param_modelos ";
        $registrosModelo = mysqli_query($conexao, $queryModelo);

        $queryTecidos = "SELECT * FROM param_tecidos ";
        $registrosTecido = mysqli_query($conexao, $queryTecidos);

        $queryCores = "SELECT * FROM param_cores ";
        $registrosCor = mysqli_query($conexao, $queryCores);

        /* $query = "SELECT *, sum(quantidade_produto) as soma_quantidade FROM produtos "; */
        $query = "SELECT *, sum(quantidade_produto) as soma_quantidade, 
                    (SELECT sum(quantidade_venda) 
                    FROM vendas V 
                    WHERE V.codigo_produto = produtos.codigo_produto ) as soma_quantidade_venda
                FROM produtos ";

        //Filtros
        $produto = $_POST['produto'] ?? "%%";
        $modelo = $_POST['modelo'] ?? "%%";
        $tecido = $_POST['tecido'] ?? "%%";
        $cor = $_POST['cor'] ?? "%%";
        $tamanho = $_POST['tamanho'] ?? "%%";

        $filtros = 'WHERE descricao_produto LIKE "' . $produto . '" AND
                        modelo_produto LIKE "' . $modelo . '" AND
                        tecido_produto LIKE "' . $tecido . '" AND
                        cor_produto LIKE "' . $cor . '" AND
                        quantidade_produto > 0 AND
                        tamanho_produto LIKE "' . $tamanho . '" ';

        $query .= $filtros;

        $query .= " GROUP BY descricao_produto, modelo_produto, tecido_produto, cor_produto, tamanho_produto ";

        $registros = mysqli_query($conexao, $query);

        ?>
        <section class="tituloConsulta">
            <h2>Controle de estoque</h2>
        </section>
        <section class="filtro-info">
            <h2>Filtrando por: </h2>
            <?php if ($produto != '%%') echo "<p>Produto: " . $produto . "</p>" ?>
            <?php if ($modelo != '%%') echo "<p>Modelo: " . $modelo . "</p>" ?>
            <?php if ($tecido != '%%') echo "<p>Tecido: " . $tecido . "</p>" ?>
            <?php if ($cor != '%%') echo "<p>Cor: " . $cor . "</p>" ?>
            <?php if ($tamanho != '%%') echo "<p>Tamanho: " . $tamanho . "</p>" ?>

        </section>
        <section class="container-estoque">
            <form action="estoque.php" method="POST" class="formulario">
                <section class="filtrosConsulta">
                    <article>
                        <a href="index.html" class="btnVoltar">Voltar</a>
                    </article>
                    <article class="consultaFiltro">
                        <label for="Produto">Produto:</label>
                        <select name="produto" class="dropConsulta">
                            <option value="%%">TODOS</option>
                            <?php
                            while ($rowProd = mysqli_fetch_assoc($registrosProduto)) {
                                $descricaoProd = $rowProd['descricao'];
                            ?>
                                <option value="<?php echo $descricaoProd ?>"><?php echo $descricaoProd ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </article>
                    <article class="consultaFiltro">
                        <label for="Modelo">Modelo:</label>
                        <select name="modelo" class="dropConsulta">
                            <option value="%%">TODOS</option>
                            <?php
                            while ($rowMod = mysqli_fetch_assoc($registrosModelo)) {
                                $descricaoMod = $rowMod['descricao'];
                            ?>
                                <option value="<?php echo $descricaoMod ?>"><?php echo $descricaoMod ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </article>
                    <article class="consultaFiltro">
                        <label for="tecido">Tecido:</label>
                        <select name="tecido" class="dropConsulta">
                            <option value="%%">TODOS</option>
                            <?php
                            while ($rowTec = mysqli_fetch_assoc($registrosTecido)) {
                                $descricaoTec = $rowTec['descricao'];
                            ?>
                                <option value="<?php echo $descricaoTec ?>"><?php echo $descricaoTec ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </article>
                    <article class="consultaFiltro">
                        <label for="cor">Cor:</label>
                        <select name="cor" class="dropConsulta">
                            <option value="%%">TODOS</option>
                            <?php
                            while ($rowCor = mysqli_fetch_assoc($registrosCor)) {
                                $descricaoCor = $rowCor['descricao'];
                            ?>
                                <option value="<?php echo $descricaoCor ?>"><?php echo $descricaoCor ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </article>
                    <article class="consultaFiltro">
                        <label for="tamanho">Tamanho:</label>
                        <select name="tamanho" class="dropConsulta">
                            <option value="%%">TODOS</option>
                            <option value="PP">PP</option>
                            <option value="P">P</option>
                            <option value="M">M</option>
                            <option value="G">G</option>
                            <option value="GG">GG</option>
                            <option value="EXG">EXG</option>
                        </select>
                    </article>
                    <article class="pesquisa">
                        <button class="btnP"> Pesquisar</button>
                    </article>
                </section>
            </form>

            <article class="listaEstoque" style="margin-top: 20px;">

                <table class="table table-hover">
                    </script>
                    <thead>
                        <tr>
                            <th style="width: 50px;" scope="col">Editar</th>
                            <th style="width: 60px;" scope="col">Código</th>
                            <th style="width: 180px;" scope="col">Produto</th>
                            <th style="width: 200px;" scope="col">Modelo</th>
                            <th style="width: 180px;" scope="col">Tecido</th>
                            <th style="width: 140px;" scope="col">Cor</th>
                            <th style="width: 40px;" scope="col">Tam</th>
                            <th style="width: 80px;" scope="col">Quantidade</th>
                            <th class="text-center" style="width: 90px;" scope="col">Valor</th>
                            <th style="width: 60px;" scope="col">Venda</th>
                            <th style="width: 80px;" scope="col">Condicional</th>
                            <th style="width: 50px;" scope="col">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($registros)) {
                            $codigo = $row['codigo_produto'];
                            $descProuto = $row['descricao_produto'];
                            $modeloProduto = $row['modelo_produto'];
                            $tecidoProduto = $row['tecido_produto'];
                            $corProduto = $row['cor_produto'];
                            $tamanhoProduto = $row['tamanho_produto'];
                            $qtdProduto = $row['soma_quantidade'];
                            $qtdProdutoVenda = $row['soma_quantidade_venda'];
                            $valorProduto = $row['valor_produto'];

                        ?>
                            <tr class="odd gradeX">
                                <td class="text-left vertical-custom">
                                    <a href="editar.php?cod_prod_venda=<?= $codigo ?>" class="btn btn-lista"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                                <td class="text-left vertical-custom">
                                    <?= $codigo; ?>
                                </td>
                                <td class="text-left vertical-custom">
                                    <?= $descProuto; ?>
                                </td>
                                <td class="text-left vertical-custom">
                                    <?= $modeloProduto; ?>
                                </td>
                                <td class="text-left vertical-custom">
                                    <?= $tecidoProduto; ?>
                                </td>
                                <td class="text-left vertical-custom">
                                    <?= $corProduto; ?>
                                </td>
                                <td class="text-right vertical-custom">
                                    <?= $tamanhoProduto; ?>
                                </td>
                                <td class="text-center vertical-custom">
                                    <?= $qtdProduto; ?> / <?= $qtdProdutoVenda + $qtdProduto; ?>
                                </td>
                                <td class="text-center vertical-custom">
                                    <?= empty($valorProduto) ? 'R$ 0,00' : 'R$ ' . $valorProduto ?>
                                </td>
                                <td class="text-center vertical-custom">
                                    <a href="venda_registrar.php?cod_prod_venda=<?= $codigo ?>" class="btn btn-lista btn-primary" type="button">SIM</a>
                                </td>
                                <td class="text-center vertical-custom">
                                    <a href="saida_registrar.php?cod_prod_saida=<?= $codigo ?>" class="btn btn-lista btn-success btn-sm" type="button">SIM</a>
                                </td>
                                <td class="text-center vertical-custom">
                                    <a href="php/produtos/excluir_produto.php?cod_produto=<?= $codigo ?>" class="btn btn-exluir btn-danger" type="button">X</a>
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