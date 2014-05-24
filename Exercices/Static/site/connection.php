<?php
	//fichier de configuration
	require_once('lib/php/config.php');
	//ouverture de la session
	Session::ouvrir();	
	/*
	if( !isset($_SESSION['user']) )
	{
		$_SESSION['user'] = new Session;
	}
	*/
	if( isset($_POST['btnconnecter']) )
	{
		Session::set('login',$_POST['email']);
		Session::set('mdp',md5($_POST['mdp']));
		header('refresh: 3;url=profil.php');

		$contenu = 'Vous êtes connecté et '.Session::getcptSession().' variables de session ont été crées...';
	}
	else
	{
		$contenu = '<form name="FormConnection" action="connection.php" method="post" class="form-horizontal">
						<fieldset>
							<legend>Connection</legend>
							<div class="form-group">
								<label for="inputEmail" class="col-lg-2 control-label">Email</label>
								<div class="col-lg-4">
									<input name="email" class="form-control" id="inputEmail" placeholder="email" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-lg-2 control-label">Password</label>
								<div class="col-lg-4">
									<input name="mdp" class="form-control" id="inputPassword" placeholder="mot de passe" type="password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-4 col-lg-offset-2">
									<button name="btnconnecter" type="submit" class="btn btn-primary">Se connecter</button>
								</div>
							</div>
						</fieldset>
					</form>';
	}
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
                        <h1>Connection</h1>
                    </div>
                </div>
            </div>
        
        <!-- Formulaire
        ================================================== -->
		<div class="row">
                <div class="col-lg-12">
                    <div class="well bs-component">
					<?php
						echo $contenu;
					?>
                    </div>
                </div>
            </div>  
        </div>
   
    </div>
<?php
	include_once('lib/js/jquery.php');
?>	
</body>
</html>
