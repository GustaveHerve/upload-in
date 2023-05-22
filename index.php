<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <title>Upload'in</title>
</head>
<body>
    <div id="first-part">
        <header>
            <h1>Upload'<span style="color:rgb(98, 109, 227)">in</span><br>your<br><span style="color:rgb(98, 109, 227);"><span id="catchphrase"></span><span id="cursor"></span></span></h1>
            <nav>
                <?php
                session_start();
                if (!isset($_SESSION['userID']))
                {
                    echo '<a href="register.php">Register</a>';
                    echo '<a href="login.php">Log in</a>';
                }
                else
                {
                    echo '<div class="profil">';
                    echo '<div class="profil-mail"><p>' . $_SESSION["user"] . '</p></div>';
                    echo '<div class="profil-icon"><img src="images/account.png"></div>';
                    echo '<div id="profil-dropdown"><a href="userspace.php">My storage</a><a href="logout.php">Log out</a></div>';
                    echo '</div>';
                }
                ?>
            </nav>
        </header>

        <h2 id="arrowtext">Discover Upload'in</h2>
        <div id="arrowcontainer">
            <a id="arrowcontainer" href="#jumparrow"><img id="arrow" src="images/arrow.png"> </a>
        </div>
    </div>
    <!-- Everything in this div is in under the wave -->
    <div id="second-part" class="under-waves">
        <div class="presentation-text" id="jumparrow">
            <div class="text">
                <h2>Access your files from anywhere</h2>
                <p>Upload'in is a plug and play cloud-based storage space solution.<br /> It can hold your videos, documents, images, and much more!<br />Get started now, all you need is a free account!</p>
            </div>
            <div class="image"><img src="images/hosting.png"></div>
        </div>

        <footer>
            <a href="credits.html">credits</a>
        </footer>
    </div>
    <script src="scripts/typeEffect.js"></script>
</body>
</html>