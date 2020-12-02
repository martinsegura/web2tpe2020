{include file="templates/head.tpl"}
<div class="nav-back">
    <a class="a-back" href="{BASE_URL}Shop">Volver</a>
</div>

<div class="register-container">
    <div class="login-items-container">
        <h1 class="login-title">Registrarse</h1>
            <form action="userRegister" method="post">
            <div>
                <label class="login-text"for="user">Nombre de usuario</label>
                <input class="login-input" type="text" name="input_user">
            </div>

            <div>
                <label class="login-text" for="password">Contraseña</label>
                <input class="login-input" type="password" name="input_password">
            </div>

            <div>
                <button class="login-submit" type="submit">Registarse</button>
            </div>
        </form>

        <p class="login-error">{$msg}</p>
    </div>
</div>
</body>