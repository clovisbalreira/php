<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Conecte-se ao banco de dados SQLite (substitua pelo seu código de conexão)

    $db = new SQLite3('./banco_dados/db.db');

    // Atualize os dados do usuário na tabela 'users'

    $stmt = $db->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Feche a conexão e redirecione para a página de listagem

    $db->close();
    header("Location: index.php");
}
?>
