<!DOCTYPE html>
<html>
<head>
    <title>Home - Mini Tabungan</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <nav>
        <h1>Mini Tabungan</h1>
        <?php if(isset($_SESSION['user_id'])): ?>
            <div>
                Welcome, <?php echo $_SESSION['user_name']; ?>
                <?php if($_SESSION['user_role'] === 'admin'): ?>
                    <a href="admin">Admin Dashboard</a>
                <?php endif; ?>
                <a href="tabung">Tabung</a>
                <a href="logout">Logout</a>
            </div>
        <?php else: ?>
            <div>
                <a href="login">Login</a>
                <a href="register">Register</a>
            </div>
        <?php endif; ?>
    </nav>

    <main>
        <h2>Tabungan Baru-Baru Ini</h2>
        <?php foreach($tabungs as $tabungan): ?>
            <div class="donation-card">
                <h3><?php echo htmlspecialchars($tabungan['name']); ?></h3>
                <p>Amount: Rp<?php echo number_format($tabungan['amount']); ?></p>
                <p>Message: <?php echo htmlspecialchars($tabungan['message']); ?></p>
                <small>Date: <?php echo $tabungan['created_at']; ?></small>
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>