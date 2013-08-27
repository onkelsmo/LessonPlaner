<?php
/**
 * 
 * LessonPlaner - index.php
 * Der Einstiegspunkt
 * 
 * Quellen
 * http://frontend.pro/javascript/jquery-overlay
 * http://www.dynamicdrive.com/forums/showthread.php?14165-Read-and-write-XML-with-PHP
 * 
 * @author SmO
 * @since 07.08.2013
 *
 */
namespace lessonPlaner;

// Set to E_ALL while debugging
error_reporting(0);

include 'includes/config.php';

// $_GET und $_POST zusammenfuegen
$request = array_merge($_GET, $_POST);

try 
{
	// einen neuen Controller erzeugen
	$controller = new Controller($request);

	echo $controller->display();
}
catch (\Exception $e)
{
	echo $e->getMessage();
	nl();
	nl('<strong>Stack Trace:</strong>');
	dump($e->getTraceAsString());
}