<?php
namespace lessonPlaner;

include 'includes/config.php';



// Testing area
try 
{
	$a = new Stunde('a', 'b', 'c');
}
catch (\Exception $e)
{
	echo $e->getMessage();
}
