<?php
	if( isset($_POST['install'])) {
		$host = $_POST['host'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$dbname = $_POST['dbname'];
		$content = "<?php \n";
		$content .= "define('__HOST__','$host');\n";
		$content .= "define('__USER__','$user');\n";
		$content .= "define('__PASS__','$pass');\n";
		$content .= "define('__DBNAME__','$dbname');\n";

		$file = fopen('config.php', 'w');
		fwrite($file, $content);
		fclose($file);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Instalar App</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
</head>
<body>
<script>
Push.Permission.request();</script>
	<?php	if( ! file_exists('config.php') ) : ?>
	<center><h2>Configurar App</h2>
	<form method="post">
		<style type="text/css">
			input{
				padding: 5px;
			}
		</style>
		<input type="hidden" name="install" value="1">
		<table class="table">
			<tr>
				<th>Host</th><td><input type="text" name="host" style="width: 100%;"></td>
			</tr>
			<tr>
				<th>User</th><td><input type="text" name="user" style="width: 100%;"></td>
			</tr>
			<tr>
				<th>Password</th><td><input type="text" name="pass" style="width: 100%;"></td>
			</tr>
			<tr>
				<th>Database Name</th><td><input type="text" name="dbname" style="width: 100%;"></td>
			</tr>
		</table>
		<input type="submit" value="Instalar App">
	</form>
	</center>
	<?php else : include 'main.php'; ?>
	<?php endif; ?>

</body>
</html>