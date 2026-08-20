<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET["id"] ?? 0;

if (!validarInteiro($id, 1)) {
    header("Location: listar.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if (!$usuario) {
    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Carta</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            background-size: cover;          
            background-position: center;     
            background-repeat: no-repeat;    
            background-attachment: fixed;
            background-image: url("https://images.alphacoders.com/126/thumb-1920-1267339.jpg");
                }
        form {
            background-color: #ffffff;
            padding: 30px; border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #555;
            font-weight: bold;
            font-size: 14px;
        }
        input, select { 
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin-top: 5px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #067c02;
            color: white; border: none;
            border-radius: 4px;
            font-size: 16px; 
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px; }    
        .voltar { 
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #555;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <form action="atualizar.php" method="POST">
        <h2>Editar Carta</h2>

        <input type="hidden" name="id" value="<?= escape($usuario["id"]) ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?= escape($usuario["nome"]) ?>">

        <label>Qualidade:</label>
        <input type="text" name="qualidade" value="<?= escape($usuario["qualidade"]) ?>">

        <label>Quantidade:</label>
        <input type="number" name="quantidade" value="<?= escape($usuario["quantidade"]) ?>">

        <label>Preço (R$):</label>
        <input type="number" step="0.01" name="preco" value="<?= escape($usuario["preco"]) ?>">

        <label>Raridade:</label>
        <select name="raridade">
            <?php
            $opcoes = ["Círculo", "Losango", "Estrela simples", "Rara Dupla", "Ilustração Rara", "Ultra-Rara / Full Art", "Ilustração Rara Especial", "Hiper Rara (Gold)", "Rara Secreta (SR)"];
            foreach ($opcoes as $opcao) {
                $selected = ($usuario["raridade"] == $opcao) ? "selected" : "";
                echo "<option value='" . escape($opcao) . "' $selected>" . escape($opcao) . "</option>";
            }
            ?>
        </select>

        <button type="submit">Salvar Alterações</button>
        <a href="listar.php" class="voltar">Voltar</a>
    </form>

</body>
</html>