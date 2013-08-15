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
	// Enthält alle gewünschten Einträge
	private static $entries = array();
	
	/**
	 * saveEntry - Speichert die Einträge in der Datenbank
	 * 
	 * @param string $fach
	 * @param string $raum
	 * @param string $lehrer
	 */
	public static function saveBlockEntry($fach, $raum, $lehrer)
	{
		$insertString = "INSERT INTO block (fach, raum, lehrer) VALUES ('" . $fach . "', '" . $raum . "', '" . $lehrer . "')";
		$insertQuery = mysql_query($insertString);
	}
	
	/**
	 * getBlockEntries - returns an array with all blocks
	 */
	public static function getBlockEntries()
	{
		$selectString = "SELECT * FROM block";
		$selectQuery = mysql_query($selectString);
		
		while($row = mysql_fetch_assoc($selectQuery))
		{
			self::$entries[] = $row;
		}
		
		return self::$entries;
	}
	
	/**
	 * getBlockEntryByFach - gibt ein array des gewaelten Blockeintrag zurück
	 * 
	 * @param string $fach
	 */
	public static function getBlockEntryByFach($fach)
	{
		$selectString = "SELECT * FROM block WHERE fach = '" . $fach . "'";
		$selectQuery = mysql_query($selectString);
		
		return mysql_fetch_assoc($selectQuery);
	}
	
	public static function savePlanEntry($block, $time)
	{
		// TODO: Update statt Insert?
		$insertString = "INSERT INTO plan (" . $time . ") VALUES ('" . $block['id'] . "')";
		$insertQuery = mysql_query($insertString);
	}
}