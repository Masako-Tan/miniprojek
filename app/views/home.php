<!DOCTYPE html>
<html>
<head>
    <title>Home - Mini Tabungan</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body class="home-body">
    <nav class="home-nav">
        <h1>Mini Tabungan</h1>
        <?php if(isset($_SESSION['user_id'])): ?>
            <div>
                <b>Welcome, <?php echo $_SESSION['user_name']; ?> </b> 
                <?php if($_SESSION['user_role'] === 'admin'): ?>
                    <a class="login-home" href="admin">Admin Dashboard</a>
                <?php endif; ?>
                <a class="login-home" href="tabung">Tabung</a>
                <a class="login-home" href="logout">Logout</a>
            </div>
        <?php else: ?>
            <div>
                <a class="login-home" href="login">Login</a>
                <a class="login-home" href="register">Register</a>
            </div>
        <?php endif; ?>
    </nav>

    <main class="home-main">
        <h2 class = "home-h">Recent Savings</h2>
        <?php foreach($tabungs as $tabungan): ?>
            <div class="tabungan-card">
                <h3 class = "home-h"><?php echo htmlspecialchars($tabungan['name']); ?></h3>
                <p class = "home-h">Amount: Rp<?php echo number_format($tabungan['amount']); ?></p>
                <p class = "home-h">Message: <?php echo htmlspecialchars($tabungan['message']); ?></p>
                <small class = "home-h">Date: <?php echo $tabungan['created_at']; ?></small>
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>