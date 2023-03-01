<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <title>Dados do servidor</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        h2, pre{
            color: black;
        }
    </style>
</head>
<body>
    <main>
        <h2>Dados do servidor</h2>
        <pre>
            < ?php echo "Super tag PHP"?>
            < ? echo "Short Open Tag"?>
            < ?= //echo "Short tag PHP";?>
            <% echo "ASP tag"%>
        </pre>
        <?php
            phpinfo();
        ?>
    </main>
</body>
</html>