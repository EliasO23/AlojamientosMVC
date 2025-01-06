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
    <title>Alojamientos | AccoTravelers</title>
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
    <?php include './views/layouts/navbar.php' ?>

    <!-- <a href="./index.php?action=users" class="btn btn-success">Usuarios</a>
    <a href="./index.php?action=newUser" class="btn btn-success">Register</a> -->

    <main>
        <header>
            <h1>Alojamientos</h1>
            <p>Encuentra tu alojamiento ideal entre nuestras mejores opciones disponibles.</p>
        </header>

        <div class="banner">
            <img src="https://news.airbnb.com/wp-content/uploads/sites/4/2019/06/PJM020719Q202_Luxe_WanakaNZ_LivingRoom_0264-LightOn_R1.jpg?fit=2500%2C1666" alt="Banner de alojamientos">
        </div>

        <div class="card-container">
            <?php foreach ($accommodations as $accommodation): ?>
                <div class="card">
                    <img src="https://digital.ihg.com/is/image/ihg/holiday-inn-san-salvador-7105916249-4x3" alt="Imagen del alojamiento">
                    <div class="card-content">
                        <h2><?php echo $accommodation['name']; ?></h2>
                        <p><?php echo $accommodation['description']; ?></p>
                        <p><strong>Ubicación:</strong> <?php echo $accommodation['location']; ?></p>
                        <p><strong> $<?php echo number_format($accommodation['price'], 2); ?> USD </strong> noche</p>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <button class="btn-select">
                                <a href="./index.php?action=addAccommodationUser&id=<?php echo $accommodation['id_accommodation']; ?>">Seleccionar</a>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

</body>

</html>