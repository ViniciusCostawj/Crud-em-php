<?php
session_start(); // Inicia a sessão PHP para armazenar dados na sessão.

// Função para procurar dados por nome
function pesquisarDadosPorNome($nome) {
    $resultados = array();
    foreach ($_SESSION['bancoDeDados'] as $id => $dados) {
        if (strtolower($dados['nome']) === strtolower($nome)) {
            $resultados[$id] = $dados;
        }
    }
    return $resultados;
}

// Função para alterar os dados
function alterarDados($id, $novosDados) {
    if (isset($_SESSION['bancoDeDados'][$id])) {
        $_SESSION['bancoDeDados'][$id] = $novosDados;
        return true;
    } else {
        return false;
    }
}

// Função para excluir os dados
function excluirDados($id) {
    if (isset($_SESSION['bancoDeDados'][$id])) {
        unset($_SESSION['bancoDeDados'][$id]);
        return true;
    } else {
        return false;
    }
}

// Valida qual ação foi solicitada (pesquisar por nome, alterar ou excluir)
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Valida se a requisição foi feita via POST.
    if (isset($_POST['acao'])) { // Valida se a variável 'acao' foi enviada via POST.
        $acao = $_POST['acao'];
        // Executa diferentes ações com base na ação solicitada.                        
        switch ($acao) {
            case 'pesquisar_nome':
                $nome = $_POST['nome_pesquisa'];
                $resultados = pesquisarDadosPorNome($nome);
                if (!empty($resultados)) {
                    echo "Resultados da pesquisa por nome: <pre>" . print_r($resultados, true) . "</pre>";
                } else {
                    echo "Nenhum resultado encontrado para o nome '$nome'.";
                }
                break;
            case 'alterar':
                $id = $_POST['id'];
                $novosDados = array('nome' => $_POST['novo_nome'], 'ra' => $_POST['novo_ra']);
                if (alterarDados($id, $novosDados)) {
                    echo "Dados alterados com sucesso.";
                } else {
                    echo "ID não encontrado. Não foi possível alterar os dados.";
                }
                break;
            case 'excluir':
                $id = $_POST['id'];
                if (excluirDados($id)) {
                    echo "Dados excluídos com sucesso.";
                } else {
                    echo "ID não encontrado. Não foi possível excluir os dados.";
                }
                break;
            default:
                echo "Ação inválida."; // Retorn para ação desconhecida.
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Banco de Dados Simulado</title>
</head>
<body>
    <h1>Banco de Dados Simulado</h1>
    <h2>Inserir Dados</h2>
    <form method="POST" action="inserir.php">
        Nome: <input type="text" name="nome"><br>
        RA: <input type="text" name="ra"><br>
        <input type="submit" value="Inserir">
    </form>

    <h2>Pesquisar Dados por Nome</h2>
    <form method="POST">
        Nome: <input type="text" name="nome_pesquisa"><br>
        <input type="hidden" name="acao" value="pesquisar_nome">
        <input type="submit" value="Pesquisar por Nome">
    </form>

    <h2>Alterar Dados</h2>
    <form method="POST">
        ID: <input type="text" name="id"><br>
        Novo Nome: <input type="text" name="novo_nome"><br>
        Novo RA: <input type="text" name="novo_ra"><br>
        <input type="hidden" name="acao" value="alterar">
        <input type="submit" value="Alterar">
    </form>

    <h2>Excluir Dados</h2>
    <form method="POST">
        ID: <input type="text" name="id"><br>
        <input type="hidden" name="acao" value="excluir">
        <input type="submit" value="Excluir">
    </form>

    <h2>Listar Todos os Dados</h2>
    <form method="POST" action="exibir.php" target="_blank">
        <input type="hidden" name="acao" value="listar_todos">
        <input type="submit" value="Listar Todos os Dados">
    </form>
</body>
</html>