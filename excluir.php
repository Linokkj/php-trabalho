<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET["id"] ?? 0;

if (validarInteiro($id, 1)) {
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: listar.php");
exit;