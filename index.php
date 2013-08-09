<?php
/**
 * 
 * LessonPlaner - index.php
 * Der Einstiegspunkt
 * 
 * @author SmO
 * @since 07.08.2013
 *
 */
namespace lessonPlaner;

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