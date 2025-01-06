<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | AccoTravelers</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include './views/layouts/navbar.php' ?>
    <div class="text-welcome">
        <h1>Bienvenido <?php echo $_SESSION['username']?></h1>
        <p>Revisa tus alojamientos preferidos..</p>

    </div>
    <div class="card-container">
        <?php foreach ($accommodations as $accommodation): ?>
            <div class="card">
                <img src="https://digital.ihg.com/is/image/ihg/holiday-inn-san-salvador-7105916249-4x3" alt="Imagen del alojamiento">
                <div class="card-content">
                    <h2><?php echo $accommodation['name']; ?></h2>
                    <p><?php echo $accommodation['description']; ?></p>
                    <p><strong>Ubicación:</strong> <?php echo $accommodation['location']; ?></p>
                    <p><strong>Precio:</strong> $<?php echo number_format($accommodation['price'], 2); ?></p>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <button class="btn-select"><a href="./index.php?action=deleteAccommodationUser&id=<?php echo $accommodation['id_accommodation']; ?>">Quitar</a></button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>