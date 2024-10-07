<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/fontawesome.min.css">
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

    <?php
    include_once "../Model/ConexaoBD.php";
    require_once '../Model/Acesso.php';
    require_once '../Controller/AcessoController.php';
    include_once "../Controller/ColecoesController.php";
    include_once "../Controller/ListaCompletaController.php";
    include_once "../Controller/SobreController.php";

    if (!isset($_SESSION)) {
        session_start();
    }
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

            <table class="w3-centered w3-table-all w3-bordered">
                <thead>
                    <tr class="w3-center w3-blue w3-text-white">
                        <th>Total de Coleções</th>
                        <th>Total de títulos</th>
                    </tr>
                </thead>
                <?php

                require_once '../Model/ConexaoBD.php';

                $sobre = new SobreController();
                $re1 = $sobre->gerarContagemCol(unserialize($_SESSION['Acesso'])->getID());
                $re2 = $sobre->gerarContagemMan(unserialize($_SESSION['Acesso'])->getID());
                if ($re1 != null and $re2 != null)
                    while ($linha = $re1->fetch_object() and $linha2 = $re2->fetch_object()) {
                        echo '<tr>';
                        echo '<td style="width: 30%;">' . $linha->totalColecoes . '</td>';
                        echo '<td style="width: 30%;">' . $linha2->totalMangas . '</td>';
                        echo '</tr>';
                    }

                ?>
            </table>

            <br>
            <table>
                <thead>
                    <tr class="w3-center w3-teal" style="background-color: #00958a">
                        <form action="../Controller/Navegacao.php" method="post">
                            <th><button name="btnColecoes"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Coleções</button>
                                <div class="w3-col">
                            </th>
                            <th><button name="btnLista"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Lista
                                    Completa</button>
                                <div class="w3-col">
                            </th>
                            <th><button name="btnLeituras"
                                    class="w3-btn w3-blue w3-card w3-cell w3-round-large w3-right">Leituras</button>
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