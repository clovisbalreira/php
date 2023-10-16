<!DOCTYPE html>
<html>
<head>
    <title>Excluir Usuário</title>
</head>
<body>
    <h1>Excluir Usuário</h1>
    <?php
    // Conecte-se ao banco de dados SQLite e recupere os dados do usuário (substitua pelo seu código de conexão)

    $db = new SQLite3('./banco_dados/db.db');
    $id = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();
    $user = $result->fetchArray();
    ?>
    <p>Tem certeza de que deseja excluir o usuário "<?= $user['name'] ?>"?</p>
    <form action="delete_process.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input type="submit" value="Sim">
        <a href="index.php">Não</a>
    </form>
</body>
</html>
