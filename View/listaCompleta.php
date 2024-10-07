<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial- scale=1.0">
    <meta httpequiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <?php
    include_once "../Model/ConexaoBD.php";
    require_once '../Model/Acesso.php';
    include_once "../Controller/AcessoController.php";
    include_once "../Controller/ListaCompletaController.php";

    if (!isset($_SESSION['Acesso'])) {
        header('Location: ../View/index.php'); // Redirecionar se não estiver autenticado
        exit();
    }

    if (!isset($_SESSION)) {
        session_start();
    }
    ;
    ?>

    <div class="w3-padding w3-content w3-margin w3-display-topright">
        <form action="../Controller/Navegacao.php" method="post"><button name="btnSair"
                class="w3-btn w3-grey w3-text-black" style="width: 100%">Sair</button></form>
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
                            <th><button name="btnColecoes"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Coleções</button>
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
                            <th><button name="btnTopoLs"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Voltar ao
                                    topo</button>
                                <div class="w3-col">
                            </th>
                            <th><button name="btnAddManga"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Adicionar
                                    Mangá</button>
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

                $lista = new ListaCompletaController();
                $resultado = $lista->gerarLista(unserialize($_SESSION['Acesso'])->getID());
                var_dump($resultado);
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
                        <form action="../Controller/Navegacao.php" method="post">
                        <input type="hidden" name="id" value="' . $linha->id . '">
                        <button name="btnExcluirManga" class="w3-button w3-block w3-white w3-cell w3-round-large">
                        <i class="fa fa-user-times w3-text-blue"></i></button></td>
                        </form></td>';
                        echo '<td style="width: 1%;">
                        <form action="../Controller/Navegacao.php" method="post">
                        <input type="hidden" name="id_Ed_Manga" value="' . $linha->id . '">
                        <button name="btnEditarManga" class="w3-button w3-block w3-white w3-cell w3-round-large">
                        <i class="fa fa-refresh fa-spin w3-text-blue""></i></button></td>
                        </form></td>';
                        echo '</tr>';
                    }
                ?>

            </table>
            <br>
            <table>
                <thead>
                    <tr class="w3-center w3-blue" style="background-color: #00958a">
                        <form action="../Controller/Navegacao.php" method="post">
                            <th><button name="btnColecoes"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Coleções</button>
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
                            <th><button name="btnTopoLs"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Voltar ao
                                    topo</button>
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