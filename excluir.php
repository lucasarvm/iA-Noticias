
<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];

    $sql = "DELETE FROM noticias WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id" => $id
    ]);
}

header("Location: listar.php");
exit;
?>
