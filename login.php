<?php
require 'App.php';
$app = new App();

// set login 
if (isset($_POST['cek_login'])) :
	$object = array(
		'user' => $_POST['username'],
		'pass' => $_POST['password']
	);

	$cek_login = $app->authentification($object['user'], $object['pass']);
	if ($cek_login == FALSE) :
		$message = "Maaf Password dan Username tidak cocok!";
	endif;
endif;
?>
<!DOCTYPE html>
<html>

<head>
	<title> Toko Serba Ada
	</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
	<meta name="" content="">
</head>

<body background="uwaw.jpg" style="background-size: cover; background-position: center;">

	<div id="login-form">
		<?php echo (isset($message)) ? $message : ''; ?>
		<img src="tokoserbaada.png" style="margin-bottom: 20px; margin-top: -160px; width: 280px; height: auto;">
		<form method="post" action="">
			<h3>
				USERNAME
			</h3>

			<input type="text" name="username" required class="input-form" />

			<h3>
				PASSWORD
			</h3>

			<input type="password" name="password" required class="input-form" />
			<br>
			<br>
			<input type="submit" name="cek_login" value="LOGIN" class="input-submit" />

		</form>
	</div>
</body>

</html>