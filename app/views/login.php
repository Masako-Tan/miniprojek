<!DOCTYPE html>
<html>
<head>
    <title>Login - Mini Tabungan</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body class="login-body">
    <nav class="login-nav">
        <h1>Mini Tabungan</h1>
        <a class="login-home" href="home">Home</a>
    </nav>

    <main class="login-main">
        <h2>Login</h2>
        <form method="POST" action="login">
            <div>
                <label>Email</label>
                <input class = "login-input" type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input class = "login-input" type="password" name="password" required>
            </div>
            <button class="login-submit" type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register">Register</a></p>
    </main>
</body>
</html>