<?php 
/**
 * LessonPlaner - install.php
 * Erstellt die Datenbank, setzt mysql login Daten
 * 
 */
namespace lessonPlaner;

include 'includes/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Stundenplan Planer | Install-Script</title>
		<link rel="stylesheet" href="css/main.css" />
	</head>
	<body>
		<h1 class="heading">Install-Script</h1>
		<p>Dieses Script legt die Datenbank und die benötigten Tabellen an.<br/>Bitte tragen Sie Ihre Datenbank Zugangsdaten in die unteren Felder ein.</p>
		<form action="" method="post">
			<label for="dbName">Name der Datenbank</label>
			<input type="text" name="dbName" />
			<label for="dbUsername">Benutzername</label>
			<input type="text" name="dbUsername" />
			<label for="dbPassword">Passwort</label>
			<input type="password" name="dbPassword" />
			<input type="submit" value="Leg los!" />
		</form>
	</body>
</html>
<?php
if (isset($_POST['dbName']) && isset($_POST['dbUsername']) && isset($_POST['dbPassword']))
{
	
}
?>