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
    <title>Users in Database</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php include './views/layouts/navbar.php' ?>

    <div class="btn-accommodations">
        <h1>Usuarios del sistema</h1>
    </div>

    <main class="center">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Creado</th>
                    <th>Cambiar a</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id_user'] ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['created_at'] ?></td>
                        <td>
                            <?php if ($user['rol_id'] == 1): ?>
                                <a href="./index?action=rolUser&id=2&user=<?php echo $user['id_user']; ?>">Administrador</a>
                            <?php else: ?>
                                <a href="./index?action=rolUser&id=1&user=<?php echo $user['id_user']; ?>">Cliente</a>
                            <?php endif; ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

</body>

</html>