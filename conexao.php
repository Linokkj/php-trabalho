<?php
$conn = new mysqli("127.0.0.1", "root", "", "meu_banco");

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");