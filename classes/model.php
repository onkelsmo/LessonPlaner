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
		$insertQuery = "INSERT INTO block (fach, raum, lehrer) VALUES ('" . $fach . "', '" . $raum . "', '" . $lehrer . "')";
		$insertResult = mysql_query($insertQuery);
	}
	
	/**
	 * getBlockEntries - returns an array with all blocks
	 */
	public static function getBlockEntries()
	{
		$selectQuery = "SELECT * FROM block";
		$selectResult = mysql_query($selectQuery);
		
		while($row = mysql_fetch_assoc($selectResult))
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
		$selectQuery = "SELECT * FROM block WHERE fach = '" . $fach . "'";
		$selectResult = mysql_query($selectQuery);
		
		return mysql_fetch_assoc($selectResult);
	}
	
	/**
	 * savePlanEntry - speichert die Zuordnung Block -> Plan in der Datenbank 
	 * 
	 * @param unknown_type $block
	 * @param unknown_type $time
	 */
	public static function savePlanEntry($block, $time)
	{
		$selectQuery = "SELECT id from plan";
		$selectResult = mysql_query($selectQuery);

		$rowArray = mysql_fetch_array($selectResult);
		
		if (!$rowArray)
		{
			$insertString = "INSERT INTO plan (" . $time . ") VALUES ('" . $block['id'] . "')";
			$insertQuery = mysql_query($insertString);
		}
		else 
		{
			$updateQuery = "UPDATE plan SET " . $time . " = '" . $block['id'] . "' WHERE id = '" . $rowArray['id'] . "'";
			$updateResult = mysql_query($updateQuery);			
		}
	}
}