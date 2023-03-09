<?php    
    require_once '../../../includes/conexao.php';
    require_once '../../../includes/login.php';
    unset($_SESSION['user']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);
    unset($_SESSION['atualizar']);
?>
<script>
    window.location.replace('http://localhost/php/sites/uniqueartesim/admin/')
</script>
