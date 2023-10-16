<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Conecte-se ao banco de dados SQLite
    $db = new SQLite3('./banco_dados/db.db');

    // Inserir dados na tabela 'users'
    /* $stmt = $db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->execute(); */
    $GLOBALS['db']->query("INSERT INTO users (name, email) VALUES ($name, $email)");

    // Feche a conexão com o banco de dados e redirecione para a lista de usuários
    $db->close();
    header("Location: index.php");
}
?>
