<?php 
/**
 * LessonPlaner - install.php
 * Erstellt die Datenbank, setzt mysql login Daten
 * 
 */
namespace lessonPlaner;

?>
<div id="overlaybg" style="display: none;"></div>
<div id="overlay" style="display: none;">
	<div class="content">		
		<h1 class="heading">Install-Script</h1>
		<p>Dieses Script legt die Datenbank und die ben&ouml;tigten Tabellen an.<br/>Bitte tragen Sie Ihre Datenbank Zugangsdaten in die unteren Felder ein.</p>
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
		<div class="closeoverlay" title="Overlay schlie�en">x</div>
		<?php
			if (isset($_POST['dbServer']) && isset($_POST['dbName']) && isset($_POST['dbUsername']) && isset($_POST['dbPassword']))
			{
				// Herstellen der Datenbankverbindung und anlegen der Datenbank
				$link = mysql_connect($_POST['dbServer'], $_POST['dbUsername'], $_POST['dbPassword']);
				if (!$link)
				{
					die("Keine Verbindung m&ouml;glich: " . mysql_error());
				}
				
				$db_selected = mysql_select_db($_POST['dbName'], $link);
				if (!$db_selected)
				{
					// Datenbank und Tabellen erstellen
					$sql = "CREATE DATABASE {$_POST['dbName']};";
					
					if (mysql_query($sql, $link))
					{
						echo "Datenbank {$_POST['dbName']} erfolgreich erstellt!<br />";
					}
					else 
					{
						echo "Fehler beim Erstellen der Datenbank: " . mysql_error() . "<br />";
					}
				}
				
				$db_selected = mysql_select_db($_POST['dbName'], $link);
				if ($db_selected)
				{
					$blockTableSql = "CREATE TABLE block(
							id INT NOT NULL AUTO_INCREMENT,
							PRIMARY KEY (id),
							fach VARCHAR (30),
							raum VARCHAR (30),
							lehrer VARCHAR (30));
							";
					$planTableSql = "CREATE TABLE plan(
							id INT NOT NULL AUTO_INCREMENT,
							PRIMARY KEY (id),
							mo1 INT, mo2 INT, mo3 INT, mo4 INT,
							di1 INT, di2 INT, di3 INT, di4 INT,
							mi1 INT, mi2 INT, mi3 INT, mi4 INT,
							do1 INT, do2 INT, do3 INT, do4 INT,
							fr1 INT, fr2 INT, fr3 INT, fr4 INT);							
							";
					
					if (mysql_query($blockTableSql, $link) && mysql_query($planTableSql, $link))
					{
						echo "Tabellen erfolgreich erstellt!<br />";
					}
					else
					{
						echo "Fehler beim Erstellen der Tabelle: " . mysql_error() . "<br />";
					}
				}
				mysql_close($link);
				
				// Speichern der Eingaben in die connection.xml
				$doc = new \DOMDocument();
				$doc->load('includes/connection.xml');
				
				$nodes = $doc->getElementsByTagName('connection');
				
				foreach ($nodes as $node)
				{
					$serverNode = $node->getElementsByTagName('server')->item(0);
					$serverNode->nodeValue = $_POST['dbServer'];
				
					$nameNode = $node->getElementsByTagName('name')->item(0);
					$nameNode->nodeValue = $_POST['dbName'];
				
					$userNode = $node->getElementsByTagName('username')->item(0);
					$userNode->nodeValue = $_POST['dbUsername'];
				
					$paswdNode = $node->getElementsByTagName('password')->item(0);
					$paswdNode->nodeValue = $_POST['dbPassword'];
				}
				$doc->save('includes/connection.xml');
				echo "Verbindungsdaten eingetragen<br />";
			}
		?>
	</div>
</div>