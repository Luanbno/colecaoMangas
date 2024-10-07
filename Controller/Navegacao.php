<?php

//Se a variável de Sessão está indefinida ou null, se inicia uma sessão com o ID passado via get/post 

if (!isset($_SESSION)) {
    session_start();
}

switch ($_POST) {

    //Caso a variavel seja nula mostrar tela de login:

    case isset($_POST[" "]):
        include_once "../View/index.php";
        break;

    //Caso a variavel seja o Primeiro Acesso:    

    case isset($_POST["btnPrimeiroAcesso"]):
        include_once "../View/primeiroAcesso.php";
        break;

    case isset($_POST["btnCadastrar"]):
        require_once '../Controller/AcessoController.php';
        $acessoController = new AcessoController();
        if (
            $acessoController->inserir(
                $_POST["txtNome"],
                $_POST["txtUsuario"],
                $_POST["txtSenha"]
            )
        ) {
            include_once "../View/index.php";
            echo '<h2 class="w3-button w3-blue" onclick="document.location="index.php""> Cadastro realizado com sucesso! </h2>';
        } else {
            include_once '../View/index.php';
            echo '<button class="w3-top-middle w3-blue" onclick="document.location="index.php""> Cadastro não realizado! </button>';
        }
        break;

    case isset($_POST["btnVoltarLogin"]):
        include_once "../View/index.php";
        break;

    // Cadastro realizado e cadastro não realizado

    case isset($_POST["btnCad"]):
        include_once "../View/index.php";
        break;

    case isset($_POST["btnCadNao"]):
        include_once "../View/index.php";
        break;

    // Login ao clicar em Entrar    

    case isset($_POST["btnEntrar"]):
        require_once '../Controller/AcessoController.php';
        $acessoController = new AcessoController();
        if (
            $acessoController->login($_POST["txtUsuario"], $_POST["txtSenha"])
        ) {
            include_once "../View/home.php";

        } else {
            include_once "../View/index.php";
            echo '<h2 class="w3-button w3-blue">Cadastro não realizado ou dados incorretos!</h2>';
        }
        break;

    // Logout ao clicar em Sair    

    case isset($_POST["btnSair"]):
        unset($_SESSION['Acesso']);
        include_once "../View/index.php";
        break;

    //Navegação entre páginas

    case isset($_POST["btnColecoes"]):
        include_once "../View/home.php";
        break;

    case isset($_POST["btnLista"]):
        include_once "../View/listaCompleta.php";
        break;

    case isset($_POST["btnLeituras"]):
        include_once "../View/leituras.php";
        break;

    case isset($_POST["btnSobre"]):
        include_once "../View/sobre.php";
        break;

    case isset($_POST["btnTopoLs"]):
        include_once "../View/listaCompleta.php";
        break;

    case isset($_POST["btnTopoLe"]):
        include_once "../View/leituras.php";
        break;

    //Páginas para Adicionar

    case isset($_POST["btnAddColecao"]):
        include_once "../View/addColecao.php";
        break;

    case isset($_POST["btnAddManga"]):
        include_once "../View/addManga.php";
        break;

    case isset($_POST["btnAddLeitura"]):
        include_once "../View/addLeitura.php";
        break;

    //Adicionar Coleção    

    case isset($_POST["btnCadColecao"]):
        require_once "../Controller/ColecoesController.php";
        require_once "../Model/Acesso.php";
        $colecao = new ColecoesController();
        if (
            $colecao->inserir(
                unserialize($_SESSION["Acesso"])->getID(),
                $_POST["txtNomeCol"],
                $_POST["txtqtManga"]
            )
        ) {
            require_once "../View/home.php";
        } else {
            include_once "../View/addColecao.php";
        }
        break;

    case isset($_POST["btnVoltarCo"]):
        include_once "../View/home.php";
        break;


    //--Excluir Coleção-//

    case isset($_POST["btnExcluirCol"]):
        require_once "../Controller/ColecoesController.php";
        include_once "../Model/Acesso.php";
        $colecao = new ColecoesController();
        if ($colecao->remover($_POST["id"]) == true) {
            include_once "../View/home.php";
        }
        break;

    //--Editar Coleção-//

    case isset($_POST["btnEditarCol"]):
        include_once "../View/editarColecao.php";
        break;

    case isset($_POST["btnAtzCol"]):
        require_once "../Controller/ColecoesController.php";
        $colController = new ColecoesController();
        if (
            $colController->editar(
                $_POST["txtIDCol"],
                $_POST["txtNomeCol"],
                $_POST["txtqtManga"]
            )
        ) {
            include_once "../View/home.php";
        }
        break;


    //Adicionar Mangá    

    case isset($_POST["btnCadManga"]):
        require_once "../Controller/ListaCompletaController.php";
        include_once "../Model/Acesso.php";
        $manga = new ListaCompletaController();
        if (
            $manga->inserir(
                unserialize($_SESSION["Acesso"])->getID(),
                $_POST["txtTitulo"],
                $_POST["txtAutor"],
                $_POST["txtVolume"],
                $_POST["txtEditora"],
                $_POST["txtEdicao"],
                $_POST["txtColecao"]
            ) != false
        ) {
            include_once "../View/listaCompleta.php";
        } else {
            include_once "../View/addManga.php";
        }
        break;

    case isset($_POST["btnVoltarLc"]):
        include_once "../View/listaCompleta.php";
        break;

    //--Excluir Mangá-//

    case isset($_POST["btnExcluirManga"]):
        require_once "../Controller/ListaCompletaController.php";
        include_once "../Model/Acesso.php";
        $colecao = new ListaCompletaController();
        if ($colecao->remover($_POST["id"]) == true) {
            include_once "../View/listaCompleta.php";
        }
        break;

    //--Editar Mangá -//

    case isset($_POST["btnEditarManga"]):
        include_once "../View/editarManga.php";
        break;

    case isset($_POST["btnAtzManga"]):
        require_once "../Controller/ListaCompletaController.php";
        $colController = new ListaCompletaController();
        if (
            $colController->editar(
                $_POST["txtIDManga"],
                $_POST["txtTitulo"],
                $_POST["txtAutor"],
                $_POST["txtVolume"],
                $_POST["txtEditora"],
                $_POST["txtEdicao"],
                $_POST["txtColecao"]
            )
        ) {
            include_once "../View/listaCompleta.php";
        }
        break;


    //Adicionar Leitura    

    case isset($_POST["btnCadLeitura"]):
        require_once "../Controller/LeiturasController.php";
        include_once "../Model/Acesso.php";
        $leitura = new LeiturasController();
        if (
            $leitura->inserir(
                unserialize($_SESSION["Acesso"])->getID(),
                $_POST["txtNomeLei"],
                $_POST["txtQtVolumes"],
                $_POST["txtLidos"],
                $_POST["txtStatus"]
            ) != false
        ) {
            include_once "../View/leituras.php";
        } else {
            include_once "../View/addLeitura.php";
        }
        break;

    case isset($_POST["btnVoltarLt"]):
        include_once "../View/leituras.php";
        break;

    //--Excluir Mangá-//

    case isset($_POST["btnExcluirLeitura"]):
        require_once "../Controller/LeiturasController.php";
        include_once "../Model/Acesso.php";
        $colecao = new LeiturasController();
        if ($colecao->remover($_POST["id"]) == true) {
            include_once "../View/leituras.php";
        }
        break;

    //--Editar Leitura -//

    case isset($_POST["btnEditarLeitura"]):
        include_once "../View/editarLeitura.php";
        break;
    case isset($_POST["btnAtzLeitura"]):
        require_once "../Controller/LeiturasController.php";
        $colController = new LeiturasController();
        if (
            $colController->editar(
                $_POST["txtIDLei"],
                $_POST["txtTitulo"],
                $_POST["txtQtVolumes"],
                $_POST["txtLidos"],
                $_POST["txtStatus"]
            )
        ) {
            include_once "../View/leituras.php";
        }
        break;























}
?>