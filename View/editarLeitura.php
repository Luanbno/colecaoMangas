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
$leitura = new LeiturasController();
$id = $_POST['idEd_Lei'];
$r = $leitura->carregarEdicao($id);
if ($r != null)
    ($visualizar = $r->fetch_object()); {
}

; ?>

<body class="w3-black">

    <div class="w3-container w3-round-xxlarge w3-display-middle w3-card-4 w3-third " style="">
        <form class="w3-container w3-white" action="../Controller/Navegacao.php" method="post">
            <div class="w3-section">
                <label class="w3-text-blue" style="font-weight: bold;">Título</label>
                <input class="w3-input w3-border w3-marginbottom" type="text" placeholder="<?php echo "$visualizar->titulo" ?>"
                    name="txtTitulo" value="<?php echo "$visualizar->titulo" ?>">
                <label class="w3-text-blue" style="font-weight: bold;">Quantidade de volumes</label>
                <input class="w3-input w3-border w3-marginbottom" type="text" placeholder="<?php echo "$visualizar->quantidade_volumes" ?>"
                    name="txtQtVolumes" value="<?php echo "$visualizar->quantidade_volumes" ?>">
                <label class="w3-text-blue" style="font-weight: bold;">Volumes lidos</label>
                <input class="w3-input w3-border" type="text" placeholder="<?php echo "$visualizar->volumes_lidos" ?>" 
                name="txtLidos" value="<?php echo "$visualizar->volumes_lidos" ?>">
                <label class="w3-text-blue" style="font-weight: bold;">Status da leitura</label>
                <input class="w3-input w3-border" type="text" placeholder="<?php echo "$visualizar->status_leitura" ?>"
                    name="txtStatus" value="<?php echo "$visualizar->status_leitura" ?>">
                <input class="w3-input w3-border w3-marginbottom" type="hidden" placeholder="<?php echo "$visualizar->id" ?>"
                    name="txtIDLei" value="<?php echo "$visualizar->id" ?>">        
                <button name="btnAtzLeitura" class="w3-button w3-block w3-blue w3-section w3-padding"
                    type="submit">Atualizar Leitura</button>
                <button name="btnVoltarLt" class="w3-button w3-block w3-blue w3-section w3-padding"
                    type="submit">Voltar</button>
            </div>
        </form>
        <br>
    </div>
</body>

</html>