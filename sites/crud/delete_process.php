<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Conecte-se ao banco de dados SQLite (substitua pelo seu código de conexão)

    $db = new SQLite3('./banco_dados/db.db');

    // Exclua o usuário da tabela 'users'

    $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Feche a conexão e redirecione para a página de
}