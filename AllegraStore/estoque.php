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
        $query = "SELECT *, sum(quantidade_produto) as soma_quantidade FROM produtos ";

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
            <?php if($produto != '%%') echo "<p>Produto: ". $produto ."</p>"?>
            <?php if($modelo != '%%') echo "<p>Modelo: ". $modelo ."</p>"?>
            <?php if($tecido != '%%') echo "<p>Tecido: ". $tecido ."</p>"?>
            <?php if($cor != '%%') echo "<p>Cor: ". $cor ."</p>"?>
            <?php if($tamanho != '%%') echo "<p>Tamanho: ". $tamanho ."</p>"?>
            
        </section>
        <section class="container-estoque">
            <form action="estoque.php" method="POST" class="formulario">
                <section class="filtrosConsulta">
                    <article class="btnVoltar">
                        <a href="index.html" id="btnCadastro">Voltar</a>
                    </article>
                    <article class="consultaFiltro">
                        <label for="Produto">Produto:</label>
                        <select name="produto" class="dropConsulta">
                            <option value="%%">TODOS</option>
                            <option value="BÁSICA CANELADA">BÁSICA CANELADA</option>
                            <option value="BLAZER">BLAZER</option>
                            <option value="BLUSA">BLUSA</option>
                            <option value="CAMISA">CAMISA</option>
                            <option value="CALÇA">CALÇA</option>
                            <option value="CONJUNTO">CONJUNTO</option>
                            <option value="SAIA">SAIA</option>
                            <option value="SHORT">SHORT</option>
                            <option value="VESTIDO LONGO">VESTIDO LONGO</option>
                        </select>
                    </article>
                    <article class="consultaFiltro">
                        <label for="Modelo">Modelo:</label>
                        <select name="modelo" class="dropConsulta">
                            <option value="%%">TODOS</option>
                            <option value="ALFAIATARIA / FORRO">ALFAIATARIA / FORRO</option>
                            <option value="CROPPED">CROPPED</option>
                            <option value="CURTA C/ FENDA FRONTAL">CURTA C/ FENDA FRONTAL</option>
                            <option value="ALFAIATARIA C/ FAIXA">ALFAIATARIA C/ FAIXA</option>
                            <option value="TRADICIONAL EM LINHO">TRADICIONAL EM LINHO</option>
                            <option value="BABADO FRONTAL">BABADO FRONTAL</option>
                            <option value="ALFAIATARIA RETA LINHO">ALFAIATARIA RETA LINHO</option>
                            <option value="ALFAIATARIA C/ PREGA">ALFAIATARIA C/ PREGA</option>
                            <option value="CHEMISE SUPER MIDI">CHEMISE SUPER MIDI</option>
                            <option value="SUBLIMADO">SUBLIMADO</option>
                            <option value="CALÇA & BLUSA">CALÇA & BLUSA</option>
                            <option value="MANGA IMPERIAL">MANGA IMPERIAL</option>
                            <option value="MANGA LONG GOLA ALTA">MANGA LONG GOLA ALTA</option>
                            <option value="MANGA LONG GOLA BAIXA">MANGA LONG GOLA BAIXA</option>
                            <option value="MANGA CURT GOLA BAIXA">MANGA CURT GOLA BAIXA</option>
                            <option value="T-SHIRT CROPPED">T-SHIRT CROPPED</option>
                            <option value="ALFAIATARIA C/ BOTÕES">ALFAIATARIA C/ BOTÕES</option>
                        </select>
                    </article>
                    <article class="consultaFiltro">
                        <label for="tecido">Tecido:</label>
                        <select name="tecido" class="dropConsulta">
                            <option value="%%">TODOS</option>
                            <option value="TWILL SAN MARINO">TWILL SAN MARINO</option>
                            <option value="TWEED XADREZ">TWEED XADREZ</option>
                            <option value="PIED DE POULE">PIED DE POULE</option>
                            <option value="BRETANIA">BRETANIA</option>
                            <option value="LINHO RUSTIC">LINHO RUSTIC</option>
                            <option value="CREPP SEVILHA">CREPP SEVILHA</option>
                            <option value="CREPP AIR FLOW">CREPP AIR FLOW</option>
                            <option value="MONTE VERMON">MONTE VERMON</option>
                            <option value="MANCHESTER">MANCHESTER</option>
                            <option value="TWILL">TWILL</option>
                            <option value="MALHA TRICOT LISA">MALHA TRICOT LISA</option>
                            <option value="TRICOT LOUISE">TRICOT LOUISE</option>
                            <option value="MALHA CANELADA">MALHA CANELADA</option>
                            <option value="MALHA PENTEADA">MALHA PENTEADA</option>
                        </select>
                    </article>
                    <article class="consultaFiltro">
                        <label for="cor">Cor:</label>
                        <select name="cor" class="dropConsulta">
                            <option value="%%">TODOS</option>
                            <option value="ROSA BARBIE">ROSA BARBIE</option>
                            <option value="CARAMELO">CARAMELO</option>
                            <option value="PRETO E BRANCO">PRETO E BRANCO</option>
                            <option value="ROSA C/ PRETO">ROSA C/ PRETO</option>
                            <option value="XADREZ PRETO E BRANCO">XADREZ PRETO E BRANCO</option>
                            <option value="ROSA BEBÊ">ROSA BEBÊ</option>
                            <option value="PRETO">PRETO</option>
                            <option value="NATURAL">NATURAL</option>
                            <option value="OFF WHITE">OFF WHITE</option>
                            <option value="ROSA">ROSA</option>
                            <option value="MARROM">MARROM</option>
                            <option value="OFF WHITE E VERDE">OFF WHITE E VERDE</option>
                            <option value="ESTAMPADO FLORAL">ESTAMPADO FLORAL</option>
                            <option value="CINZA MESCLA">CINZA MESCLA</option>
                            <option value="PURPURA">PURPURA</option>
                            <option value="CARAMELO">CARAMELO</option>
                            <option value="BRANCO">BRANCO</option>
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
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th style="width: 60px;" scope="col">Código</th>
                            <th style="width: 190px;" scope="col">Produto</th>
                            <th style="width: 210px;" scope="col">Modelo</th>
                            <th style="width: 200px;" scope="col">Tecido</th>
                            <th style="width: 240px;" scope="col">Cor</th>
                            <th style="width: 80px;" scope="col">Tamanho</th>
                            <th style="width: 80px;" scope="col">Quantidade</th>
                            <th style="width: 60px;" scope="col">Venda</th>
                            <th style="width: 80px;" scope="col">Condicional</th>
                            <th style="width: 60px;" scope="col">Excluir</th>
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
                                <td class="text-right vertical-custom">
                                    <?= $qtdProduto; ?>
                                </td>
                                <td class="text-center vertical-custom">
                                    <a href = "venda_registrar.php?cod_prod_venda=<?= $codigo ?>" class="btn btn-lista btn-primary" type="button">SIM</a>
                                </td>
                                <td class="text-center vertical-custom">
                                    <a href = "saida_registrar.php?cod_prod_saida=<?= $codigo ?>" class="btn btn-lista btn-success btn-sm" type="button">SIM</a>
                                </td>
                                <td class="text-center vertical-custom">
                                    <a href = "php/produtos/excluir_produto.php?cod_produto=<?= $codigo ?>" class="btn btn-exluir btn-danger" type="button">X</a>
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

    <footer>
        <section class="rodape_img">
            <img class="logo" src="img/logo.png" alt="logo">
        </section>
    </footer>

</body>

</html>