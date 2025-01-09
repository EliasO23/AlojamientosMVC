<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AccoTravelers</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include './views/layouts/navbar.php' ?>
    <main class="center">
        <div class="login-container">
            <div class="image-container">
                <img src="https://forbes.es/wp-content/uploads/2023/05/Airbnb-Negocio_01.jpg" alt="Imagen de bienvenida">
            </div>
            <div class="form-container">
                <h2>Iniciar Sesión</h2>
                <?php if (!empty($errorMessage)): ?>
                    <p class="error-message"><?= htmlspecialchars($errorMessage) ?></p>
                <?php endif; ?>
                <form action="./index.php?action=sessionUser" method="POST">
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" placeholder="Ingresa tu correo" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div class="center">
                        <button type="submit" class="btn">Iniciar Sesión</button>
                    </div>
                    <p class="register-link">
                        ¿No tienes cuenta? <a href="./index.php?action=newUser">Regístrate aquí</a>
                    </p>
                </form>
            </div>
        </div>
    </main>


</body>

</html>