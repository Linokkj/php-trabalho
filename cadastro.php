<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Carta</title>
    <style>
        * { 
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            background-size: cover;          
            background-position: center;     
            background-repeat: no-repeat;    
            background-attachment: fixed;
            background-image: url("https://images8.alphacoders.com/124/thumb-1920-1243956.jpg");
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
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
            background-color: #ffd900; 
            color: white; border: none; 
            border-radius: 4px; 
            font-size: 16px; 
            font-weight: bold; 
            cursor: pointer; 
            margin-top: 20px;
        }
        button:hover{
            background-color: #ffd900;
        }
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

    <form action="salvar.php" method="POST">
        <h2>Cadastrar Carta</h2>

        <label>Nome:</label>
        <input type="text" name="nome">

        <label>Qualidade:</label>
        <input type="text" name="qualidade">

        <label>Quantidade:</label>
        <input type="number" name="quantidade">

        <label>Preço (R$):</label>
        <input type="number" step="0.01" name="preco">

        <label>Raridade:</label>
        <select name="raridade">
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
        <a href="index.php" class="voltar">Voltar</a>
    </form>

</body>
</html>