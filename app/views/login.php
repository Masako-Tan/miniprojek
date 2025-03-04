<!DOCTYPE html>
<html>
<head>
    <title>Login - Mini Tabungan</title>
    <!-- <link rel="stylesheet" href="public/css/style.css"> -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        form div {
            display: flex;
            flex-direction: column;
        }
        body{
            font-family: Arial, sans-serif;
            line-height: 1.6;
            
        }
        button:hover {
            background: #444;
        }

        main {
            padding: 2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        nav {
            background: #333;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <nav>
        <h1>Mini Tabungan</h1>
        <a href="home">Home</a>
    </nav>

    <main>
        <h2>Login</h2>
        <form method="POST" action="login">
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register">Register</a></p>
    </main>
</body>
</html>