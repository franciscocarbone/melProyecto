<!DOCTYPE html>
<html>
	
<head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Mi primer ejemplo de OpenID, esta vez usando Google y la libreria LightOpenID</title> </head>
<body>

<p>Mi primer ejemplo de OpenID, esta vez usando Google como emisor y mi aplicación como consumidor con ayuda de la librería LightOpenID</p>

<?php
  require 'openid.php';
  session_start();
  if (isset($_SESSION['username']))
	{
	    echo "La sesión de ".$_SESSION['mail']." esta activa";
		echo "<a href='logout.php'><button>Salir</button></a>";
		}
	else{
		try {
			# Change 'localhost' to your domain name.
			$openid = new LightOpenID('localhost');
			if(!$openid->mode) {
				if(isset($_GET['login'])) {
					$openid->identity = 'https://www.google.com/accounts/o8/id';
					$openid->required = array('contact/email');
					header('Location: ' . $openid->authUrl());
				}
?>
	<form action="?login" method="post">
		<button>Login with Google</button>
	</form>
	<?php
		} elseif($openid->mode == 'cancel') {
			echo 'User has canceled authentication!';
    } else {
		#echo "lo que estoy setenado es el validate".$openid->validate();
		if ($openid->validate()){
			$_SESSION['username']=$openid->identity;
			$atributos=$openid->getAttributes();
			$_SESSION['mail']=$atributos["contact/email"];//atributos["contact/email"];
			header('Location:login.php');
		} else
		{ echo "Usuario sin loguear";
			}
	}
	} catch(ErrorException $e) {
		echo $e->getMessage();
	}
}
 ?>  
 
</body>
</html>



