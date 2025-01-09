<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Alojamiento</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include './views/layouts/navbar.php' ?>
    <main class="center">
        <div class="login-container">
            <div class="form-container">
                <form action="./index.php?action=createAccomodations" method="POST">
                    <h1>Nuevo Alojamiento</h1>
                    <p>Ingresa los datos del nuevo alojamiento</p>
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" placeholder="Ingresa el nombre del alojamiento" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion:</label>
                        <input type="text" name="description" placeholder="Ingresa su descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Ubicacion:</label>
                        <input type="text" name="location" placeholder="Ingresa la ubicacion del alojamiento" required>
                    </div>
                    <div class="form-group">
                        <label for="imageURL">URL de Imagen:</label>
                        <input type="text" name="imageURL" placeholder="Ingresa la URL de la imagen" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Precio por noche:</label>
                        <input type="number" name="price" placeholder="Ingresa el precio por noche" required>
                    </div>
                    <div class="center">
                        <button type="submit" class="btn">Agregar</button>
                        <a class="btn" href="./index.php?action=adminDashboard"> Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

    </main>
</body>

</html>