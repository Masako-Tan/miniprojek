<!DOCTYPE html>
<html>
<head>
    <title>Tabung - Mini Tabungan</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body class ="tabung-body">
    <nav class ="tabung-nav">
        <h1>Mini Tabungan</h1>
        <a class="login-home"  href="home">Home</a>
    </nav>

    <main class="tabung-main">
        <h2>Start Saving</h2>
        <form method="POST" action="tabung">
            <div>
                <label>Amount (Rp)</label>
                <input class = "tabung-input" type="number" name="amount" required>
            </div>
            <div>
                <label>Message</label>
                <textarea class = "tabung-textarea" name="message" required></textarea>
            </div>
            <button class = "tabung-submit" type="submit">Save</button>
        </form>
    </main>
</body>
</html>