<?php
/**
 * LessonPlaner - model.php
 * Klasse fuer den Datenzugriff
 * 
 * @author Smo
 * @since 09.08.2013
 */
namespace lessonPlaner;

class Model
{
	// Enth�lt alle gew�nschten Eintr�ge
	private static $entries = array();
	
	/**
	 * saveEntry - Speichert die Eintr�ge in der Datenbank
	 * 
	 * @param string $fach
	 * @param string $raum
	 * @param string $lehrer
	 */
	public static function saveEntry($fach, $raum, $lehrer)
	{
		$insertString = "INSERT INTO block (fach, raum, lehrer) VALUES ('" . $fach . "', '" . $raum . "', '" . $lehrer . "')";
		$insertQuery = mysql_query($insertString);
		
	}
}