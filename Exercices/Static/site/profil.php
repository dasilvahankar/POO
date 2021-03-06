<?php
	//fichier de configuration
	require_once('lib/php/config.php');
	//ouverture de la session
	Session::ouvrir();	

    if( isset($_SESSION['login']) )
	{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>monSite</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/slate.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="lib/js/html5shiv.js"></script>
    <script src="lib/js/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
    <?php
        include_once('menu.php');
    ?>

    <!-- Contenu
    ================================================== -->
    <div class="container">
    
        <div class="bs-docs-section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1>Profil</h1>
                    </div>
                </div>
            </div>
        
        <!-- Formulaire
        ================================================== -->
		<div class="row">
                <div class="col-lg-12">
                    <div class="well bs-component">
					<?php
						Session::afficher();
					?>
                    </div>
                </div>
            </div>  
        </div>
   
    </div>
<?php
	}
	else
	{
		header('refresh: 0;url=index.php');
	}
	include_once('lib/js/jquery.php');
?>	
</body>
</html>
