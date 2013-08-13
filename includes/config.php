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
include 'classes/Stunde.php';

// DB-connection
$doc = new DOMDocument();
$doc->load('connection.xml');

$nodes = $doc->getElementsByTagName('connection');
foreach ($nodes as $node)
{
	$name = $node->getElementsByTagName('name');
	$userName = $node->getElementsByTagName('username');
	$password = $node->getElementsByTagName('password');
}






$dbServer = 'localhost';
$dbUser = '';
$dbPaswd = '';
$dbName = '';

//mysql_connect($dbServer, $dbUser, $dbPaswd) or die ("Keine Verbindung möglich!");
//mysql_select_db($dbName) or die ("Die Datenbank existiert nicht!");


