<?php
$conn = new mysqli("localhost", "root", "", "meu_banco");


// Salvar alteração
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $qualidade = $_POST["qualidade"];
    $quantidade = $_POST["quantidade"];
    $raridade = $_POST["raridade"]; 

    $sql = "UPDATE usuarios
            SET
                nome = '$nome',
                qualidade = '$qualidade',
                quantidade = '$quantidade',
                raridade = '$raridade'
            WHERE id = $id";

    $conn->query($sql);

    header("Location: index.php");
    exit;
}

// Buscar usuário
$id = $_GET["id"];
$sql = "SELECT * FROM usuarios WHERE id = $id";
$resultado = $conn->query($sql);
$usuario = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{}
    </style>
</head>
<body>
    
</body>
</html>

<h2>Editar usuário</h2>

<form method="POST">

    <input type="hidden" name="id" value="<?= $usuario["id"] ?>">

    Nome:
    <input type="text" name="nome" value="<?= $usuario["nome"] ?>">
    <br><br>

    Qualidade:
    <input type="text" name="qualidade" value="<?= $usuario["qualidade"] ?>">
    <br><br>

    Quantidade:
    <input type="number" name="quantidade" value="<?= $usuario["quantidade"] ?>">
    <br><br>

    Raridade:
    <!-- Usando select para manter o padrão do seu cadastro -->
    <select name="raridade">
        <?php
        $opcoes = ["Círculo", "Losango", "Estrela simples", "Rara Dupla", "Ilustração Rara", "Ultra-Rara / Full Art", "Ilustração Rara Especial", "Hiper Rara (Gold)", "Rara Secreta (SR)"];
        foreach ($opcoes as $opcao) {
            $selected = ($usuario["raridade"] == $opcao) ? "selected" : "";
            echo "<option value='$opcao' $selected>$opcao</option>";
        }
        ?>
    </select>
    <br><br>

    <button type="submit">Salvar</button>
</form>