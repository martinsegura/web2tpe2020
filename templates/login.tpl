{include file="templates/head.tpl"}
<div>
        <form action="userLogin" method="post">
        <div>
            <label for="user">Usuario</label>
            <input type="text" name="input_user">
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input type="password" name="input_password">
        </div>

        <div>
            <button type="submit">Entrar</button>
        </div>
    </form>

    <p>{$msg}</p>
</div>
</body>