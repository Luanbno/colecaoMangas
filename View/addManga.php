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

<?php
require_once "../Model/ConexaoBD.php";
require_once '../Model/Acesso.php';
require_once '../Controller/AcessoController.php';
include_once "../Controller/LeiturasController.php";

if (!isset($_SESSION['Acesso'])) {
    header('Location: ../View/index.php'); // Redirecionar se não estiver autenticado
    exit();
}

if (!isset($_SESSION)) {
    session_start();
}
; ?>

<body class="w3-black">

    <div class="w3-container w3-round-xxlarge w3-display-middle w3-card-4 w3-third " style="">
        <form class="w3-container w3-white" action="../Controller/Navegacao.php" method="post">
            <div class="w3-section">
                <label class="w3-text-blue" style="font-weight: bold;">Título</label>
                <input class="w3-input w3-border w3-marginbottom" type="text" placeholder="Insira o nome do mangá"
                    name="txtTitulo">
                <label class="w3-text-blue" style="font-weight: bold;">Autor</label>
                <input class="w3-input w3-border w3-marginbottom" type="text" placeholder="Insira o nome do autor"
                    name="txtAutor">
                <label class="w3-text-blue" style="font-weight: bold;">Volume</label>
                <input class="w3-input w3-border" type="text" placeholder="Informe qual o volume" name="txtVolume">
                <label class="w3-text-blue" style="font-weight: bold;">Editora</label>
                <input class="w3-input w3-border" type="text" placeholder="Insira a editora que publicou"
                    name="txtEditora">
                <label class="w3-text-blue" style="font-weight: bold;">Edição</label>
                <input class="w3-input w3-border" type="text" placeholder="Insira a edição (padrão, luxo, 2em1, ...)"
                    name="txtEdicao">
                <label class="w3-text-blue" style="font-weight: bold;">Coleção</label>
                <input class="w3-input w3-border" type="text" placeholder="Informe a qual coleção pertence"
                    name="txtColecao">
                
                <button name="btnCadManga" class="w3-button w3-block w3-blue w3-section w3-padding"
                    type="submit">Adicionar Mangá</button>
                <button name="btnVoltarLc" class="w3-button w3-block w3-blue w3-section w3-padding"
                    type="submit">Voltar</button>
            </div>
        </form>
        <br>
    </div>
</body>

</html>