<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Mini Tabungan</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body class="admin-body">
    <nav class="admin-nav">
        <h1>Mini Tabungan - Admin Dashboard</h1>
        <div>
            <a class="login-home" href="home">Home</a>
            <a class="login-home" href="logout">Logout</a>
        </div>
    </nav>

    <main class="admin-main">

        <h2>All Savings</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Message</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tabungs as $tabungan): ?>
                    <tr>
                        <td><?php echo $tabungan['id']; ?></td>
                        <td><?php echo htmlspecialchars($tabungan['name']); ?></td>
                        <td>Rp<?php echo number_format($tabungan['amount']); ?></td>
                        <td><?php echo htmlspecialchars($tabungan['message']); ?></td>
                        <td><?php echo $tabungan['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>