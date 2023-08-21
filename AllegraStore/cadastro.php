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
        $codigoRec = $_GET['codigo'] ?? null;

        $queryProduto = "SELECT * FROM param_produtos ";
        $registrosProduto = mysqli_query($conexao, $queryProduto);

        $queryModelo = "SELECT * FROM param_modelos ";
        $registrosModelo = mysqli_query($conexao, $queryModelo);

        $queryTecidos = "SELECT * FROM param_tecidos ";
        $registrosTecido = mysqli_query($conexao, $queryTecidos);

        $queryCores = "SELECT * FROM param_cores ";
        $registrosCor = mysqli_query($conexao, $queryCores);

        ?>
        <section>
            <form action="php/produtos/salvar_produto.php" method="POST">
                <section class="cadastro">
                    <article class="tituloCadastro">
                        <h2>Cadastro de Produto</h2>
                    </article>
                    <article class="formC">
                        <label for="Produto">Produto:</label>
                        <select name="produto" id="formDentro" required>
                            <option value="">Produto</option>
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
                    <article class="formC">
                        <label for="Modelo">Modelo:</label>
                        <select name="modelo" id="formDentro" required>
                            <option value="">Modelo</option>
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
                    <article class="formC">
                        <label for="tecido">Tecido:</label>
                        <select name="tecido" id="formDentro" required>
                            <option value="">Tecido</option>
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
                    <article class="formC">
                        <label for="cor">Cor:</label>
                        <select name="cor" id="formDentro" required>
                            <option value="">Cor</option>
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
                    <article class="formC">
                        <label for="tamanho">Tamanho:</label>
                        <select name="tamanho" id="formDentro" required>
                            <option value=""> Tamanho </option>
                            <option value="PP">PP</option>
                            <option value="P">P</option>
                            <option value="M">M</option>
                            <option value="G">G</option>
                            <option value="GG">GG</option>
                            <option value="EXG">EXG</option>
                        </select>
                    </article>
                    <article class="formC">
                        <label for="valor">Valor:</label>
                        <input placeholder="Valor unitário" id="formDentro" min=0 type="number" step=".01" inputmode="numeric" name="valor">
                    </article>
                    <article class="formC">
                        <label for="quantidade">Quantidade:</label>
                        <input placeholder="Quantidade" id="formDentro" min=1 type="number" name="quantidade" required>
                    </article>
                    <section class="btn-container">
                        <article>
                            <a href="index.html" class="btnVoltar">Voltar</a>
                        </article>
                        <article>
                            <input type="submit" value="Cadastrar" class="btnCadastro">
                        </article>
                        <?php
                        if ($codigoRec) {
                        ?>
                            <article>
                                <a href="recadastro.php?codigo=<?php echo $codigoRec; ?>" class="btnCadastro"> Recadastrar </a>
                            </article>
                        <?php
                        }
                        ?>
                    </section>

                </section>
            </form>

        </section>

    </main>

</body>

</html>