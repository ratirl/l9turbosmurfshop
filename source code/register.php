<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/stylesheet.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="javascript.js"></script>
</head>

<body>
    <header>
        <div class="container">
            <h1>ALI LEAGUE OF LEGENDS WINKEL</h1>
        </div>

    </header>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="index.php">Home</a> |
            <a href="producten.php">Producten</a> |
            <a href="contact.php">Contact</a> |
            <a href="Winkelmand.php">Winkelmand</a>
            <?php if(isset($_SESSION['user'])): ?>
                <a href="logout.php">Uitloggen</a>
                <?php else: ?>
                    <a href="login.php">Inloggen</a>
                    <?php endif; ?>
                        <?php if(isset($_SESSION['user']) && $_SESSION['user'] == 'ali'){ ?>
                            <a href="admin.php">Bestellingen</a>
                            <?php } ?>
        </div>
    </nav>

    <section>
        <div class="container">
            <h1 class="display-4">Registeren</h1>
            <?php require('errors.php'); ?>
                <label style="color:red" id="wachtwoord_check"> </label>
                <form action="registreren.php" method="post">
                    <div class="form-group">
                        <label>Username:</label>
                        <br>
                        <input type="text" name="username" id="username" required value="<?php if(isset($_GET[" user "])){ echo $_GET["user "];} ?>">

                    </div>
                    <div class="form-group">
                        <label>Wachtwoord:</label>
                        <br>
                        <input type="password" name="wachtwoord" id="wachtwoord" required minlength="10">
                    </div>
                    <div class="form-group">
                        <label>Nog eens wachtwoord:</label>
                        <br>
                        <input type="password" name="wachtwoord_controle" id="wachtwoord_controle" required minlength="10" onkeyup='check_wachtwoord();'>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark">Registeren</button>
                    <br>
                    <br>
                    <div>
                        <p>U heeft al een account? <a href="login.php">Login</a></p>
                    </div>

                </form>

        </div>

    </section>

    <footer class="bg-dark">
        <div class="container">
            <p>Ali Trabi copyright &copy; ft Riot Games L9 </p>

        </div>
    </footer>
</body>

</html>