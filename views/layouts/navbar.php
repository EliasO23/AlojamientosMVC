<nav class="navbar">
    <section class="navbar-container">
        <!-- Logo -->
        <a href="./index.php" class="logo">
            <img src="./assets/img/AccoTravelers.png" alt="Icono" width="50" height="50">
            <h1>AccoTravelers</h1>
        </a>
        <!-- <a href="./index.php" class="logo">AccoTravelers</a> -->

        <!-- Enlaces de navegación -->
        <ul class="navbar-links">

            <?php if (isset($_SESSION['rol_id'])): ?>
                <?php if ($_SESSION['rol_id'] == 1): ?>
                    <li><a href="./index.php?">Inicio</a></li>
                <?php else: ?>
                    <li><a href="./index.php?action=adminDashboard">Inicio</a></li>
                    <li><a href="./index.php?action=listUsers">Usuarios</a></li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if ($_SESSION['rol_id'] == 1): ?>
                    <li><a href="./index.php?action=getAccommodationUser">Home</a></li>
                <?php endif; ?>
                <li><a href="./index.php?action=logout">Cerrar sesión</a></li>
            <?php else: ?>
                <li><a href="./index.php?action=sessionUser">Iniciar sesión</a></li>
                <li><a href="./index.php?action=newUser">Registrarse</a></li>
            <?php endif; ?>

        </ul>

    </section>
</nav>