<!DOCTYPE html>
<html>
<head>
    <title>Register - Mini Tabungan</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body class="reg-body">
    <nav class = "reg-nav">
        <h1>Mini Tabungan</h1>
        <a class="login-home" href="home">Home</a>
    </nav>

    <main class = "reg-main">
        <h2>Register</h2>
        <form method="POST" action="register">
            <div>
                <label>Name</label>
                <input class = "login-input" type="text" name="name" required>
            </div>
            <div>
                <label>Email</label>
                <input class = "login-input" type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input class = "login-input" type="password" name="password" required>
            </div>
            <button class="reg-submit" type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login">Login</a></p>
    </main>
</body>
</html>