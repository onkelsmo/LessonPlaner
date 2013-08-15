<?php
/**
 * 
 * LessonPlaner - config.php
 * 
 * @author smo
 * @since 07.08.2013
 *
 */
namespace lessonPlaner;

// includes
include 'classes/freaky_functions.php';
include 'classes/controller.php';
include 'classes/view.php';
include 'classes/model.php';

// DB-connection
$dbServer = '';
$dbUser = '';
$dbPaswd = '';
$dbName = '';

// Parsen der connection.xml
$doc = new \DOMDocument();
$doc->load('includes/connection.xml');

$nodes = $doc->getElementsByTagName('connection');

foreach ($nodes as $node)
{
	$dbServer = $node->getElementsByTagName('server')->item(0)->nodeValue;
	$dbName = $node->getElementsByTagName('name')->item(0)->nodeValue;
	$dbUser = $node->getElementsByTagName('username')->item(0)->nodeValue;
	$dbPaswd = $node->getElementsByTagName('password')->item(0)->nodeValue;
}

// Wenn alle Daten vorhanden sind, DB-Verbindung aufbauen
if ($dbServer != '' && $dbName != '' && $dbUser != '')
{
	mysql_connect($dbServer, $dbUser, $dbPaswd) or die ("Keine Verbindung möglich!");
	mysql_select_db($dbName) or die ("Die Datenbank existiert nicht!");
}
// Install-Script aufrufen
else
{
	include 'install.php';
}



