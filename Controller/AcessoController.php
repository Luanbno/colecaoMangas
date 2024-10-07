<?php

if (!isset($_SESSION)) {
    session_start();
}
class AcessoController
{

    // Método Inserir //
    //função de instanciar um objeto da classe Acesso e inserir os dados em sua respectiva tabela //

    public function inserir($nome, $usuario, $senha)
    {
        require_once '../Model/Acesso.php';
        $acesso = new Acesso();
        $acesso->setNome($nome);
        $acesso->setUsuario($usuario);
        $acesso->setSenha($senha);
        $resultado = $acesso->inserirBD();
        $_SESSION['Acesso'] = serialize($acesso);
        return $resultado;
    }

    // Método Login//
    //função de instanciar um objeto da classe Acesso //
    //realiza o login por meio dos parâmetros usuario e senha, verificando a senha e iniciando a sessão//

    public function login($usuario, $senha)
    {
        require_once '../Model/Acesso.php';
        $acesso = new Acesso();
        $acesso->carregarUsuario($usuario);
        $verificarSenha = $acesso->getSenha();
        if ($senha == $verificarSenha) {
            $_SESSION['Acesso'] = serialize($acesso);
            return true;
        } else {
            return false;
        }
    }

    public function logado() {
        return $_SESSION['Acesso'];
    }
}
?>