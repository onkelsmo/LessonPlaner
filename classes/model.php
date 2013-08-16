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
	private static $blockEntries = array();
	private static $planEntries = array();
	
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
			self::$blockEntries[] = $row;
		}
		
		return self::$blockEntries;
	}
	
	/**
	 * getPlanEntries - returns an array with all plan entries
	 */
	public static function getPlanEntries()
	{
		$selectQuery = "SELECT * FROM plan";
		$selectResult = mysql_query($selectQuery);
	
		while($row = mysql_fetch_assoc($selectResult))
		{
			self::$planEntries[] = $row;
		}
	
		return self::$planEntries;
	}
		
	/**
	 * getPlanEntryByTag - gibt ein array des gewaelten Planeintrags zurück ausgewaehlt nach einem gegebenen tag
	 *
	 * @param string $tag - irgendein Datenbank-Spaltenname
	 */
	public static function getPlanEntryByTag($tag)
	{
		$selectQuery = "SELECT * FROM plan WHERE " . $tag . " = '" . $tag . "' AND '" . $tag . "' IS NOT NULL";
		$selectResult = mysql_query($selectQuery);
	
		return mysql_fetch_assoc($selectResult);
	}
	
	/**
	 * getBlockEntryByTag - gibt ein array des gewaelten Blockeintrag zurück ausgewaehlt nach einem gegebenen tag
	 * 
	 * @param string $tag - irgendein Datenbank-Spaltenname
	 */
	public static function getBlockEntryByTag($tag)
	{
		$selectQuery = "SELECT * FROM block WHERE " . $tag . " = '" . $tag . "'";
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