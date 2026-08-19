<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "meu_banco"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO usuarios
            (nome, email, senha)
            VALUES
            ('$nome', '$email', '$senha')";

    $conn->query($sql);

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
     /* Reset básico para padronizar tamanhos e margens */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* Cartão central do formulário */
.card {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

h2 {
    margin-bottom: 20px;
    color: #333333;
    text-align: center;
}

/* Espaçamento dos campos de entrada */
.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555555;
    font-weight: bold;
    font-size: 14px;
}

input {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #cccccc;
    border-radius: 4px;
    font-size: 14px;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}

/* Efeito ao clicar no campo para digitar */
input:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.2);
}

/* Estilo do botão principal */
button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.2s;
    margin-top: 10px;
}

button:hover {
    background-color: #0056b3;
}

/* Caixa de aviso/erro */
.erro {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 4px;
    font-size: 14px;
    text-align: center;
    margin-bottom: 15px;
    border: 1px solid #f5c6cb;
}  

    </style>
</head>
<body>
    
</body>
</html>

<h2>Cadastrar usuário</h2>

<form method="POST" class="table">

    Nome:
    <input
        type="text"
        name="nome"
    >

    <br><br>

    Email:
    <input
        type="email"
        name="email"
    >

    <br><br>

    Senha:
    <input
        type="password"
        name="senha"
    >
    
    <br><br>

    <button type="submit">
        Cadastrar
    </button>

</form>