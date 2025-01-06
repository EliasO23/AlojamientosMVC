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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include './views/layouts/navbar.php' ?>

    <div class="btn-accommodations">
        <h1>Alojamientos en la Base de Datos</h1>
        <a href="./index.php?action=createAccomodations" class="btn btn-success">Nuevo Alojamiento</a>
    </div>
    

    <main class="center">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Ubicación</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accommodations as $accommodation): ?>
                    <tr>
                        <td><?= $accommodation['id_accommodation'] ?></td>
                        <td><?= htmlspecialchars($accommodation['name']) ?></td>
                        <td><?= htmlspecialchars($accommodation['description']) ?></td>
                        <td><?= htmlspecialchars($accommodation['location']) ?></td>
                        <td><?= number_format($accommodation['price'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>

</html>