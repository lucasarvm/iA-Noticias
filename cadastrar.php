
<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $categoria = $_POST["categoria"];
    $conteudo = $_POST["conteudo"];

    $sql = "INSERT INTO noticias (titulo, categoria, conteudo)
            VALUES (:titulo, :categoria, :conteudo)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":titulo" => $titulo,
        ":categoria" => $categoria,
        ":conteudo" => $conteudo
    ]);

    echo "Notícia cadastrada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Notícia</title>
</head>
<body>

    <h1>Cadastrar Notícia</h1>

    <form method="POST">

        <label>Título:</label><br>
        <input type="text" name="titulo" required>
        <br><br>

        <label>Categoria:</label><br>
        <input type="text" name="categoria" required>
        <br><br>

        <label>Conteúdo:</label><br>
        <textarea name="conteudo" required></textarea>
        <br><br>

        <button type="submit">Cadastrar</button>

    </form>

</body>
</html>
