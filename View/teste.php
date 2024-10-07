<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>Coleção de Mangás</title>

    <style>
        /* Definimos que a sidebar terá uma largura de 120px e cor a cord de fundo #222 */

        .w3-sidebar {
            width: 120px;
        }

        /*Define Fonte para todas as tags listadas abaixo*/
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif
        }
    </style>

</head>

<body class="w3-black">

    <!-- Verificar se a sessão está aberta ou não -->

    <?php
    include_once "../Model/ConexaoBD.php";
    include_once "../Controller/ColecoesController.php";
    include_once "../Controller/ListaCompletaController.php";
    include_once "../Controller/LeiturasController.php";

    if (isset($_SESSION['Acesso'])):?>
        <p>Bem-vindo, <?php echo ($_SESSION['Acesso']);?>!</p>;
        <?php endif; ?>


    <div class="w3-padding w3-content w3-margin w3-display-topright">
        <form action="../C/Navegacao.php" method="post"><button name="btnSair" class="w3-btn w3-grey w3-text-black"
                style="width: 100%">Sair</button></form>
    </div>

    <br>
    <br>

    <div class="w3-padding-32 w3-center w3-content w3-text-black">
        <div class="w3-paddingw3-content w3-display-topmiddle w3-margin">
            <h2 class="w3-text-blue">MINHA COLEÇÃO DE MANGÁS</h2>
        </div>>
        <br>
        <br>

        <div class="w3-container">

            <table>
                <thead>
                    <tr class="w3-center w3-blue" style="background-color: #00958a">
                        <form action="../Controller/Navegacao.php" method="post">
                            <th><button name="btnLista"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Lista
                                    Completa</button>
                                <div class="w3-col">
                            </th>
                            <th><button name="btnLeituras"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Leituras</button>
                                <div class="w3-col">
                            </th>
                            <th><button name="btnSobre"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Sobre</button>
                                <div class="w3-col">
                            </th>
                            <th><button name="btnAddColecao"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Adicionar
                                    Coleção</button>
                                <div class="w3-col">
                            </th>
                        </form>
        </div>
        </tr>
        <thead>
            </table>
            <br>

            <table class="w3-centered w3-table-all w3-bordered">
                <thead>
                    <tr class="w3-center w3-blue w3-text-white">
                        <th>Coleção</th>
                        <th>Quantidade</th>
                        <th>Excluir</th>
                        <th>Atualizar</th>
                    </tr>
                </thead>
                <?php

                require_once '../Model/ConexaoBD.php';
                $colecoes = new ColecoesController();
                $resultado = $colecoes->gerarLista(unserialize($_SESSION['Acesso'])->getID());
                if ($resultado != null)
                    while ($linha = $resultado->fetch_object()) {
                        echo '<tr>';
                        echo '<td style="width: 30%;">' . $linha->nome . '</td>';
                        echo '<td style="width: 20%;">' . $linha->quantidade_mangas . '</td>';
                        echo '<td style="width: 1%;">
                        <form action="../C/Navegacao.php" method="post">
                        <input type="hidden" name="id" value="' . $linha->id . '">
                        <button name="btnExcluirCol" class="w3-button w3-block w3-white w3-cell w3-round-large">
                        <i class="fa fa-user-times w3-text-blue"></i></button></td>
                        </form></td>';
                        echo '<td style="width: 1%;">
                        <form action="../C/Navegacao.php" method="post">
                        <input type="hidden" name="id" value="' . $linha->id . '">
                        <button name="btnEditarCol" class="w3-button w3-block w3-white w3-cell w3-round-large">
                        <i class="fa fa-refresh fa-spin w3-text-blue""></i></button></td>
                        </form></td>';
                        echo '</tr>';

                    }
                ?>
            </table>

            <br>
            <br>
            <br>

            <table class="w3-centered w3-table-all w3-bordered">
                <thead>
                    <tr class="w3-center w3-blue w3-text-white">
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Volume</th>
                        <th>Editora</th>
                        <th>Edição</th>
                        <th>Coleção</th>
                        <th>Excluir</th>
                        <th>Atualizar</th>
                    </tr>
                </thead>
                <?php

                require_once '../Model/ConexaoBD.php';
                $lista = new ListaCompletaController();
                $resultado = $lista->gerarLista(unserialize($_SESSION['Acesso'])->getID());
                if ($resultado != null)
                    while ($linha = $resultado->fetch_object()) {
                        echo '<tr>';
                        echo '<td>' . $linha->titulo . '</td>';
                        echo '<td>' . $linha->autor . '</td>';
                        echo '<td>' . $linha->volume . '</td>';
                        echo '<td>' . $linha->editora . '</td>';
                        echo '<td>' . $linha->edicao . '</td>';
                        echo '<td>' . $linha->colecao . '</td>';
                        echo '<td style="width: 1%;">
                        <form action="../C/Navegacao.php" method="post">
                        <input type="hidden" name="id" value="' . $linha->id . '">
                        <button name="btnExcluirManga" class="w3-button w3-block w3-white w3-cell w3-round-large">
                        <i class="fa fa-user-times w3-text-blue"></i></button></td>
                        </form></td>';
                        echo '<td style="width: 1%;">
                        <form action="../C/Navegacao.php" method="post">
                        <input type="hidden" name="id" value="' . $linha->id . '">
                        <button name="btnEditarManga" class="w3-button w3-block w3-white w3-cell w3-round-large">
                        <i class="fa fa-refresh fa-spin w3-text-blue""></i></button></td>
                        </form></td>';
                        echo '</tr>';
                    }
                ?>
            </table>

            <br>
            <br>
            <br>

            <table class="w3-centered w3-table-all w3-bordered">
                <thead>
                    <tr class="w3-center w3-blue w3-text-white">
                        <th>Título</th>
                        <th>Volumes</th>
                        <th>Volumes lidos</th>
                        <th>Status</th>
                        <th>Excluir</th>
                        <th>Atualizar</th>
                    </tr>
                </thead>
                <?php

                require_once '../Model/ConexaoBD.php';
                $leituras = new LeiturasController();
                $resultado = $leituras->gerarLista(unserialize($_SESSION['Acesso'])->getID());
                if ($resultado != null)
                    while ($linha = $resultado->fetch_object()) {
                        echo '<tr>';
                        echo '<td>' . $linha->titulo . '</td>';
                        echo '<td>' . $linha->quantidade_volumes . '</td>';
                        echo '<td>' . $linha->volumes_lidos . '</td>';
                        echo '<td>' . $linha->status_leitura . '</td>';
                        echo '<td style="width: 1%;">
                        <form action="../C/Navegacao.php" method="post">
                        <input type="hidden" name="id" value="' . $linha->id . '">
                        <button name="btnExcluirLeitura" class="w3-button w3-block w3-white w3-cell w3-round-large">
                        <i class="fa fa-user-times w3-text-blue"></i></button></td>
                        </form></td>';
                        echo '<td style="width: 1%;">
                        <form action="../C/Navegacao.php" method="post">
                        <input type="hidden" name="id" value="' . $linha->id . '">
                        <button name="btnEditarLeitura" class="w3-button w3-block w3-white w3-cell w3-round-large">
                        <i class="fa fa-refresh fa-spin w3-text-blue""></i></button></td>
                        </form></td>';
                        echo '</tr>';
                    }
                ?>
            </table>

            <table>
                <thead>
                    <tr class="w3-center w3-blue" style="background-color: #00958a">
                        <form action="../Controller/Navegacao.php" method="post">
                            <th><button name="btnLista"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Lista
                                    Completa</button>
                                <div class="w3-col">
                            </th>
                            <th><button name="btnLeituras"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Leituras</button>
                                <div class="w3-col">
                            </th>
                            <th><button name="btnSobre"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Sobre</button>
                                <div class="w3-col">
                            </th>
                        </form>
    </div>
    </tr>
    <thead>
        </table>
        </div>

        </div>
</body>
</html>