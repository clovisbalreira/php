<section id="login">
    <h1>Login:</h1>
    <form action="./mvc/controller/login.php" method="post">
        <div>
            <label for="usuario">Usuario</label>
            <input type="text" name="loginUsuario" id="loginUsuario" placeholder="Digite o usuário" value='<?php echo $usuario;?>' required>
        </div>
        <div>
            <label for="senha">Senha</label>
            <input type="password" name="loginSenha" id="loginSenha" placeholder="Digite a senha do usuário" value='<?php echo $senha;?>' required>
        </div>
        <input type="submit" value="ACESSAR">
    </form>
</section>