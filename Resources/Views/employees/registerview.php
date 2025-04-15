<?php include_once __DIR__ . '/../templates/header.php'; ?>

<div class="container">
    <h2>Register</h2>
    <?php if (isset($error)) : ?>
        <div style="color: red;">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form action="../controller/RegisterController.php" method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="enable2FA">Enable 2FA:</label>
            <input type="checkbox" name="enable2FA" id="enable2FA">
        </div>
        <div>
            <input type="submit" value="Register">
        </div>
    </form>
</div>

<?php include_once __DIR__ . '/../templates/footer.php'; ?>