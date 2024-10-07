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

    <div class="w3-container w3-round-xxlarge w3-display-middle w3-card-4 w3-third " style="">
        <form class="w3-container w3-white" action="../Controller/Navegacao.php" method="post">
            <div class="w3-section">
                <label class="w3-text-blue" style="font-weight: bold;">Usuário</label>
                <input class="w3-input w3-border w3-marginbottom" type="text" placeholder="Digite o Usuário"
                    name="txtUsuario" required>
                <label class="w3-text-blue" style="font-weight: bold;">Senha</label>
                <input class="w3-input w3-border" type="password" placeholder="Digite a Senha" name="txtSenha" required>
                <button name= "btnEntrar" class="w3-button w3-block w3-blue w3-section w3-padding" type="submit">Entrar</button>
                <button name="btnPrimeiroAcesso" class="w3-button w3-block w3-blue w3-section w3-padding" type="submit">Primeiro Acesso?</button>
            </div>
        </form>
        <br>
    </div>
</body>
</html>