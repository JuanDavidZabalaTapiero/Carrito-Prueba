<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/css/styles.css">
</head>

<body>
    <header class="mainHeader">
        <nav>
            <a href="../index.php">Logo</a>
        </nav>
    </header>

    <main>
        <section class="formLogin">
            <form action="../Controllers/Client/login.php" method="post">
                <label for="nombreUser">Nombre</label>
                <input type="text" name="nombreUser" id="nombreUser">

                <label for="passUser">Contraseña</label>
                <input type="password" name="passUser" id="passUser">

                <input type="submit" value="Entrar">
            </form>
        </section>
    </main>

    <footer class="mainFooter"></footer>
</body>

</html>