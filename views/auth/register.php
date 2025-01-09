<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AccoTravelers</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include './views/layouts/navbar.php' ?>

    <main class="center">
        <div class="login-container">
            <div class="image-container">
                <img src="https://a0.muscache.com/im/pictures/miso/Hosting-704324414628501081/original/52a1f520-dca4-4574-ac49-27b24c73f39c.jpeg" alt="Imagen de bienvenida">
            </div>
            <div class="form-container">
                <form action="./index.php?action=newUser" method="POST">
                    <h2>Registrarse</h2>
                    <?php if (!empty($errorMessage)): ?>
                        <p class="error-message"><?= htmlspecialchars($errorMessage) ?></p>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="username">Nombre de usuario:</label>
                        <input type="text" name="username" placeholder="Ingresa tu nombre de usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" name="email" placeholder="Ingresa tu correo" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirmacion:</label>
                        <input type="password" name="confirm_password" placeholder="Confirme su contraseña" required>
                    </div>
                    <div class="center">
                        <button type="submit" class="btn">Crear Cuenta</button>
                    </div>
                    <p class="register-link">
                        ¿Ya tienes cuenta? <a href="./index.php?action=sessionUser">Inicia sesion aquí</a>
                    </p>
                </form>
            </div>
        </div>
    </main>
</body>

</html>