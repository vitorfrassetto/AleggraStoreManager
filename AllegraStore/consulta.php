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
        //Filtros
        /* $query = "SELECT * FROM vendas as vend
                    RIGHT JOIN produtos ON (produtos.codigo_produto = vend.codigo_produto) "; */
        $query = "SELECT * ,
                    (SELECT sum(quantidade_venda) 
                    FROM vendas 
                    WHERE vendas.codigo_produto = produtos.codigo_produto) as soma_vendas
                FROM vendas as v
                RIGHT JOIN produtos ON (produtos.codigo_produto = v.codigo_produto) ";

        $produto = $_POST['produto'] ?? "%%";
        $modelo = $_POST['modelo'] ?? "%%";
        $tecido = $_POST['tecido'] ?? "%%";
        $cor = $_POST['cor'] ?? "%%";
        $tamanho = $_POST['tamanho'] ?? "%%";
        $situacao = $_POST['situacao'] ?? "VENDA";

        $filtros = 'WHERE produtos.descricao_produto LIKE "' . $produto . '" AND
                        produtos.modelo_produto LIKE "' . $modelo . '" AND
                        produtos.tecido_produto LIKE "' . $tecido . '" AND
                        produtos.cor_produto LIKE "' . $cor . '" AND
                        tipo_venda LIKE "' . $situacao . '" AND
                        quantidade_venda > 0 AND
                        produtos.tamanho_produto LIKE "' . $tamanho . '" ';

        $query .= $filtros . " ORDER BY v.quantidade_venda DESC";

        $registros = mysqli_query($conexao, $query);

        ?>
        <section class="tituloConsulta">
            <h2>Produtos vendidos</h2>
        </section>
        <section class="filtro-info">
            <h2>Filtrando por: </h2>
            <?php if ($produto != '%%')
                echo "<p>Produto: " . $produto . "</p>";
            if ($modelo != '%%')
                echo "<p>Modelo: " . $modelo . "</p>";
            if ($tecido != '%%')
                echo "<p>Tecido: " . $tecido . "</p>";
            if ($cor != '%%')
                echo "<p>Cor: " . $cor . "</p>";
            if ($tamanho != '%%')
                echo "<p>Tamanho: " . $tamanho . "</p>";
            if ($situacao != '%%')
                echo "<p>Situação: " . $situacao . "</p>" ?>

        </section>
        <section class="container-estoque container-consulta">
            <form action="consulta.php" method="POST" class="formulario">
                <section class="filtrosEstoque">
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
                    <article class="consultaFiltro">
                        <label for="situação">Situação:</label>
                        <select name="situacao" class="dropConsulta">
                            <option value="VENDA">VENDA</option>
                            <option value="CONDICIONAL">CONDICIONAL</option>
                        </select>
                    </article>
                    <article class="pesquisa">
                        <button class="btnP"> Pesquisar</button>
                    </article>
                </section>
            </form>

            <article class="listaEstoque" style="margin-top: 20px;">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th style="width: 60px;" scope="col">Código</th>
                            <th style="width: 165px;" scope="col">Produto</th>
                            <th style="width: 200px;" scope="col">Modelo</th>
                            <th style="width: 160px;" scope="col">Tecido</th>
                            <th style="width: 150px;" scope="col">Cor</th>
                            <th style="width: 40px;" scope="col">Tam</th>
                            <th style="width: 70px;" class="text-center" scope="col">Qtd</th>
                            <th style="width: 110px;" scope="col">Situação</th>
                            <th class="text-center" style="width: 120px;" scope="col">Valor Unitário</th>
                            <th class="text-center" style="width: 120px;" scope="col">Valor total</th>
                            <?php
                            if ($situacao == "CONDICIONAL") {
                            ?>
                                <th style="width: 100px;" scope="col">Virar Venda</th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qtdTodosVendidos = 0;
                        $valorTotalProduto = 0;
                        $valorTotalTodosProdutos = 0;

                        while ($row = mysqli_fetch_assoc($registros)) {
                            $venda = $row['codigo_venda'];
                            $codigo = $row['codigo_produto'];
                            $descProuto = $row['descricao_produto'];
                            $modeloProduto = $row['modelo_produto'];
                            $tecidoProduto = $row['tecido_produto'];
                            $corProduto = $row['cor_produto'];
                            $tamanhoProduto = $row['tamanho_produto'];
                            $qtdProduto = $row['quantidade_venda'] ?? 0;
                            $qtdProd = $row['quantidade_produto'];
                            $qtdTodosVendidos += $qtdProduto;
                            $qtdTotalVend = $row['soma_vendas'];
                            $valorProduto = $row['valor_produto'] ?? 0;
                            $valorTotalProduto = $qtdProduto * $valorProduto;
                            $valorTotalTodosProdutos += $valorTotalProduto;
                            $tpProduto = $row['tipo_venda'] ?? " ";

                        ?>
                            <tr class="odd gradeX">
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
                                    <?= $qtdProduto; ?> / <?= $qtdProd + $qtdTotalVend ?>
                                </td>
                                <td class="text-left vertical-custom">
                                    <?= $tpProduto; ?>
                                </td>
                                <td class="text-center vertical-custom">
                                    <?= empty($valorProduto) ? 'R$ 0,00' : 'R$ ' . $valorProduto ?>
                                </td>
                                <td class="text-center vertical-custom">
                                    <?= 'R$ ' . number_format($valorTotalProduto, 2, ',', '.'); ?>
                                </td>
                                <?php
                                if ($tpProduto == "CONDICIONAL") {
                                ?>
                                    <td class="text-center vertical-custom">
                                        <a href="venda_depois_condicional.php?cod_produto_venda=<?= $venda ?>&cod_produto=<?= $codigo ?>" class="btn btn-lista btn-success" type="button">SIM</a>
                                    </td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </article>

        </section>
        <section class="rel-total">
            <article class="container-rel-total">
                <p><strong>Total de produtos vendidos: </strong><?= $qtdTodosVendidos ?></p>
                <p><strong>Valor total de vendas: </strong> <?= 'R$ ' . number_format($valorTotalTodosProdutos, 2, ',', '.') ?></p>
            </article>
        </section>
    </main>

</body>

</html>