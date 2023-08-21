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

    <main class="mainIndex">
        <?php
        $codigo = $_GET['cod_produto'];
        $venda = $_GET['cod_produto_venda'];

        $query = "SELECT * FROM produtos INNER JOIN vendas ON produtos.codigo_produto = " . $codigo . " AND vendas.codigo_produto = " . $codigo;

        $resultProdutos = mysqli_query($conexao, $query);

        $rowProduto = mysqli_fetch_assoc($resultProdutos);

        if ($rowProduto) {
            $descProduto = $rowProduto['descricao_produto'];
            $modeloProduto = $rowProduto['modelo_produto'];
            $tecidoProduto = $rowProduto['tecido_produto'];
            $corProduto = $rowProduto['cor_produto'];
            $tamanhoProduto = $rowProduto['tamanho_produto'];
            $quantidadeTotal = $rowProduto['quantidade_venda'];
            $valor = $rowProduto['valor_produto'];
        } else {
            echo "<script language='javascript' type='text/javascript'>
                alert('Produto não existe no estoque');window.location.href='venda.php';
            </script>";
        }

        ?>
        <section>
            <form action="php/vendas/efetuar_venda_depois_condicional.php" method="POST">
                <section class="vendas">
                    <article class="tituloVendas">
                        <h1>Vendas</h1>
                    </article>

                    <article class="formV">
                        <section class="cont-infos">
                            <label for="Produto">Codigo:</label>
                            <input placeholder="Código do Produto" class="input-desabilitado" id="formDentroSaida" type="number" name="codigo" value=<?php echo $codigo; ?> readonly>
                        </section>
                        <section class="cont-infos">
                            <label for="Produto">Cod Venda:</label>
                            <input placeholder="Código da venda" class="input-desabilitado" id="formDentroSaida" type="number" name="codigoVenda" value=<?php echo $venda; ?> readonly>
                        </section>
                        <section class="cont-infos">
                            <label for="Produto">Produto: </label>
                            <input placeholder="Código do Produto" class="input-desabilitado" id="formDentroSaida" value="<?php echo $descProduto; ?>" type="text"
                                name="produto" readonly>
                        </section>
                        <section class="cont-infos">
                            <label for="modelo">Modelo:</label>
                            <input placeholder="Código do Produto" class="input-desabilitado" id="formDentroSaida" value="<?php echo $modeloProduto; ?>" type="text"
                                name="modelo" readonly>
                        </section>
                        <section class="cont-infos">
                            <label for="tecido">Tecido:</label>
                            <input placeholder="Código do Produto" class="input-desabilitado" id="formDentroSaida" value="<?php echo $tecidoProduto; ?>" type="text"
                                name="tecido" readonly>
                        </section>
                        <section class="cont-infos">
                            <label for="cor">Cor:</label>
                            <input placeholder="Código do Produto" class="input-desabilitado" id="formDentroSaida" value="<?php echo $corProduto; ?>" type="text"
                                name="cor" readonly>
                        </section>
                        <section class="cont-infos">
                            <label for="tamanho">Tamanho:</label>
                            <input placeholder="Código do Produto" class="input-desabilitado" id="formDentroSaida" value="<?php echo $tamanhoProduto; ?>" type="text"
                                name="tamanho"  readonly>
                        </section>
                        <section class="cont-infos">
                            <label for="quantidade">Quantidade:</label>
                            <input placeholder="Quantidade" class="input-digitavel" id="formDentroSaida" type="number" min=0 max=<?php echo $quantidadeTotal; ?> name="quantidade" required>
                        </section>
                        <section class="cont-infos">
                            <label for="quantidade">Valor (R$):</label>
                            <input placeholder="Valor unitário" class="input-desabilitado" id="formDentroSaida" value="<?php echo $valor; ?>" type="number" min=0 step=".01" name="valor">
                        </section> 
                        <section class="cont-infos">
                            <p>Quantidade disponível: <?php echo $quantidadeTotal; ?></p>
                        </section>
                    </article>
                    <section class="btn-container">
                        <article>
                            <a href="index.html" class="btnVoltar">Voltar</a>
                        </article>
                        <article>
                            <input type="submit" value="Avançar" class="btnCadastro">
                        </article>
                    </section>
                </section>

            </form>

        </section>

    </main>
</body>

</html>