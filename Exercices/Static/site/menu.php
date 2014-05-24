<!-- Navbar
================================================== -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand"><b>mon Site</b></a>
<!--
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
-->
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php">Accueil</a>
                </li>
                <li>
                    <a href="portfolio.php">Portfolio</a>
                </li>
                <li>
                    <a href="services.php">Services</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
<!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Themes <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a href="slate.css/">Par défaut</a></li>
                        <li class="divider"></li>
                        <li><a href="">Slate</a></li>
                        <li><a href="">Flatty</a></li>
                    </ul>
                </li>
-->
            </ul>

            <ul class="nav navbar-nav navbar-right">
            <?php
                if( isset($_SESSION['login']) )
                {
                    echo '<li><a href="profil.php">Profil</a></li>';				
                    echo '<li><a href="deconnection.php">Déconnection</a></li>';
                    echo '<li><a href="panier.php"><img src="img/panier24.png"> | <b>0</b> articles</a></li>';
                }
                else
                {
                    echo '<li><a href="inscription.php">Inscription</a></li>';
                    echo '<li><a href="connection.php">Connection</a></li>';
                }

            ?>
            </ul>

        </div>
    </div>
</div>