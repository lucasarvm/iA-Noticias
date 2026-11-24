
<?php
require_once "conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM noticias WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([":id" => $id]);

$noticia = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$noticia) {
    die("Notícia não encontrada!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $categoria = $_POST["categoria"];
    $conteudo = $_POST["conteudo"];

    $sql = "UPDATE noticias SET
            titulo = :titulo,
            categoria = :categoria,
            conteudo = :conteudo
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":titulo" => $titulo,
        ":categoria" => $categoria,
        ":conteudo" => $conteudo,
        ":id" => $id
    ]);

    header("Location: listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Notícia</title>
</head>
<body>

    <h1>Editar Notícia</h1>

    <form method="POST">

        <label>Título:</label><br>
        <input type="text" name="titulo"
        value="<?php echo htmlspecialchars($noticia['titulo']); ?>" required>
        <br><br>

        <label>Categoria:</label><br>
        <input type="text" name="categoria"
        value="<?php echo htmlspecialchars($noticia['categoria']); ?>" required>
        <br><br>

        <label>Conteúdo:</label><br>
        <textarea name="conteudo" required><?php echo htmlspecialchars($noticia['conteudo']); ?></textarea>
        <br><br>

        <button type="submit">Salvar alterações</button>

    </form>

</body>
</html>
