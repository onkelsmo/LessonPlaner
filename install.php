<?php 
/**
 * LessonPlaner - install.php
 * Erstellt die Datenbank, setzt mysql login Daten
 * 
 */
namespace lessonPlaner;

//include 'includes/config.php';
?>
<div id="overlaybg" style="display: none;"></div>
	<div id="overlay" style="display: none;">
		<div class="content">		
			<h1 class="heading">Install-Script</h1>
			<p>Dieses Script legt die Datenbank und die benötigten Tabellen an.<br/>Bitte tragen Sie Ihre Datenbank Zugangsdaten in die unteren Felder ein.</p>
			<form action="" method="post">
				<label for="dbServer">Name des Servers</label>
				<input type="text" name="dbServer" />
				<label for="dbName">Name der Datenbank</label>
				<input type="text" name="dbName" />
				<label for="dbUsername">Benutzername</label>
				<input type="text" name="dbUsername" />
				<label for="dbPassword">Passwort</label>
				<input type="password" name="dbPassword" />
				<input type="submit" value="Leg los!" />
			</form>
			<div class="closeoverlay" title="Overlay schließen">x</div>
		</div>
	</div>
<?php
if (isset($_POST['dbServer']) && isset($_POST['dbName']) && isset($_POST['dbUsername']) && isset($_POST['dbPassword']))
{
	// Speichern der Eingaben in die connection.xml
	 
}
?>