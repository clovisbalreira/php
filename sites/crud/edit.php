<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <?php
    // Conecte-se ao banco de dados SQLite e recupere os dados do usuário (substitua pelo seu código de conexão)

    $db = new SQLite3('./banco_dados/db.db');
    $id = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();
    $user = $result->fetchArray();
    ?>
    <form action="edit_process.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        Nome: <input type="text" name="name" value="<?= $user['name'] ?>"><br>
        Email: <input type="text" name="email" value="<?= $user['email'] ?>"><br>
        <input type="submit" value="Salvar">
    </form>
    <a href="index.php">Voltar para a lista de usuários</a>
</body>
</html>
