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
        $codigo = $_GET['cod_prod_saida'];

        $query = "SELECT * FROM produtos WHERE codigo_produto = " . $codigo;
        $resultProdutos = mysqli_query($conexao, $query);
        
        $rowProduto = mysqli_fetch_assoc($resultProdutos);

        if($rowProduto){
            $descProduto = $rowProduto['descricao_produto'];
            $modeloProduto = $rowProduto['modelo_produto'];
            $tecidoProduto = $rowProduto['tecido_produto'];
            $corProduto = $rowProduto['cor_produto'];
            $tamanhoProduto = $rowProduto['tamanho_produto'];

        } else {
            echo "<script language='javascript' type='text/javascript'>
                alert('Produto não existe no estoque');window.location.href='saida.php';
            </script>";
        }

        ?>
        <section>
            <form action="php/vendas/efetuar_venda_condicional.php" method="POST">
                <section class="vendas">
                    <article class="tituloVendas">
                        <h1>Venda Condicional</h1>
                    </article>

                    <article class="formV">
                        <section class="cont-infos">
                            <label for="codigo">Código:</label>
                            <input placeholder="Código do Produto" class="input-desabilitado" id="formDentroSaida" value=<?php echo $codigo; ?> type="number"
                                name="codigo" readonly>
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
                            <input placeholder="Quantidade" class="input-digitavel" id="formDentroSaida" type="number" min=1 name="quantidade" required>
                        </section>
                    </article>
                    <section class="btn-container">
                        <article class="btnVoltar">
                            <a href="saida.php" id="btnCadastro">Voltar</a>
                        </article>
                        <article class="btnVendas">
                            <input type="submit" value="Avançar" id="btnCadastro">
                        </article>
                    </section>
                </section>

            </form>

        </section>

    </main>

    <footer>
        <section class="rodape_img">
            <img class="logo" src="img/logo.png" alt="logo">
        </section>
    </footer>

</body>

</html>