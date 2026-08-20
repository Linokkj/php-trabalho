<?php
require_once "conexao.php";
require_once "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id         = $_POST["id"] ?? 0;
    $nome       = $_POST["nome"] ?? '';
    $qualidade  = $_POST["qualidade"] ?? '';
    $quantidade = $_POST["quantidade"] ?? '';
    $raridade   = $_POST["raridade"] ?? '';
    $preco      = $_POST["preco"] ?? '';

    // Validações
    if (!validarInteiro($id, 1)) {
        die("Erro: ID inválido.");
    }
    if (!validarTexto($nome)) {
        die("Erro: O nome é obrigatório.");
    }
    if (!validarTexto($qualidade)) {
        die("Erro: A qualidade é obrigatória.");
    }
    if (!validarInteiro($quantidade, 0)) {
        die("Erro: Quantidade inválida.");
    }
    if (!validarRaridade($raridade)) {
        die("Erro: Raridade inválida.");
    }
    if (!validarPreco($preco)) {
        die("Erro: O preço é inválido.");
    }

    // Atualização Segura
    $stmt = $conn->prepare("UPDATE usuarios SET nome=?, qualidade=?, quantidade=?, raridade=?, preco=? WHERE id=?");
    $stmt->bind_param("ssisdi", $nome, $qualidade, $quantidade, $raridade, $preco, $id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: listar.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}