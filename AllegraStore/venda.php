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
        <section>
            <form action="php/vendas/avancar_venda.php" method="POST">
                <section class="vendas">
                    <article class="tituloVendas">
                        <h1>Vendas</h1>
                    </article>

                    <article class="formV">
                        <section class="cont-infos">
                            <label for="Produto">Produto:</label>
                            <input placeholder="Código do Produto" class="input-digitavel" id="formDentroSaida" min=1 type="number" name="codigo"required>
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