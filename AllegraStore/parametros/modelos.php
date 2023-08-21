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

    <main class="mainIndex">
        <section>
            <form action="../php/parametros/avancar_modelo.php" method="POST">
                <section class="vendas">
                    <article class="tituloVendas">
                        <h1>Modelos</h1>
                    </article>

                    <article class="formV">
                        <section class="cont-infos">
                            <label for="Modelo">Modelo:</label>
                            <input placeholder="Modelo" class="input-digitavel" id="formDentroSaida" type="text" name="descricao" required>
                        </section>
                    </article>
                    <section class="btn-container">
                        <article>
                            <a href="../parametros/listaModelos.php" class="btnVoltar">Voltar</a>
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