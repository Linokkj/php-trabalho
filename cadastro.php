<?php
$conn = new mysqli("localhost", "root", "", "meu_banco");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? '';
    $qualidade = $_POST["qualidade"] ?? '';
    $quantidade = $_POST["quantidade"] ?? 0;
    $raridade = $_POST["raridade"] ?? '';

    // Comando SQL corrigido para inserir corretamente
    $sql = "INSERT INTO usuarios (nome, qualidade, quantidade, raridade) 
            VALUES ('$nome', '$qualidade', '$quantidade', '$raridade')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        $erro = "Erro ao cadastrar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; flex-direction: column; }
        form { background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); width: 100%; max-width: 400px; }
        h2 { margin-bottom: 20px; color: #333333; text-align: center; }
        label { display: block; margin-bottom: 5px; color: #555555; font-weight: bold; font-size: 14px; margin-top: 10px; }
        input, select { width: 100%; padding: 10px 12px; border: 1px solid #cccccc; border-radius: 4px; font-size: 14px; outline: none; margin-bottom: 10px; }
        button { width: 100%; padding: 12px; background-color: #007bff; color: #ffffff; border: none; border-radius: 4px; font-size: 16px; font-weight: bold; cursor: pointer; margin-top: 15px; }
        button:hover { background-color: #0056b3; }
        .erro { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; font-size: 14px; text-align: center; margin-bottom: 15px; border: 1px solid #f5c6cb; } 
    </style>
</head>
<body>

    <form method="POST">
        <h2>Cadastrar</h2>

        <?php if (!empty($erro)) { echo "<div class='erro'>$erro</div>"; } ?>

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Qualidade:</label>
        <input type="text" name="qualidade">

        <label>Quantidade:</label>
        <input type="number" name="quantidade">

        <label>Raridade:</label>
        <select name="raridade" required>
            <option value="">Selecione</option>
            <option value="Círculo">Círculo</option>
            <option value="Losango">Losango</option>
            <option value="Estrela simples">Estrela simples</option>
            <option value="Rara Dupla">Rara Dupla</option>
            <option value="Ilustração Rara">Ilustração Rara</option>
            <option value="Ultra-Rara / Full Art">Ultra-Rara / Full Art</option>
            <option value="Ilustração Rara Especial">Ilustração Rara Especial</option>
            <option value="Hiper Rara (Gold)">Hiper Rara (Gold)</option>
            <option value="Rara Secreta (SR)">Rara Secreta (SR)</option>
        </select>

        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>