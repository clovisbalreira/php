<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <ul>
        <?php
        // Conecte-se ao banco de dados SQLite e liste os usuários (substitua pelo seu código de conexão)

        $db = new SQLite3('./banco_dados/db.db');
        $results = $db->query("SELECT * FROM users");

        while ($row = $results->fetchArray()) {
            echo "<li>{$row['name']} - {$row['email']} ";
            echo "<a href='edit.php?id={$row['id']}'>Editar</a> ";
            echo "<a href='delete.php?id={$row['id']}'>Excluir</a></li>";
        }

        $db->close();
        ?>
    </ul>
    <a href="create.php">Criar Novo Usuário</a>
</body>
</html>
