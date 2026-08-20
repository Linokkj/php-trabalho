<?php
require_once "conexao.php";
require_once "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome       = $_POST["nome"] ?? '';
    $qualidade  = $_POST["qualidade"] ?? '';
    $quantidade = $_POST["quantidade"] ?? '';
    $raridade   = $_POST["raridade"] ?? '';
    $preco      = $_POST["preco"] ?? '';

    // Validações no Back-end
    if (!validarTexto($nome)) {
        die("Erro: O nome da carta é obrigatório.");
    }
    if (!validarTexto($qualidade)) {
        die("Erro: A qualidade é obrigatória.");
    }
    if (!validarInteiro($quantidade, 0)) {
        die("Erro: Quantidade inválida.");
    }
    if (!validarRaridade($raridade)) {
        die("Erro: Opção de raridade inválida.");
    }
    if (!validarPreco($preco)) {
        die("Erro: O preço não pode ser negativo.");
    }

    // Gravação segura usando Prepared Statement
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, qualidade, quantidade, raridade, preco) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisd", $nome, $qualidade, $quantidade, $raridade, $preco);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: listar.php");
        exit;
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}