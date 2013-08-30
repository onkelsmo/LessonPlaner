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
	 * saveBlockEntry - inserts a block entry to the database
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
	 * getBlockEntryByTag - gibt ein array des gewaelten Blockeintrag zurück ausgewaehlt nach einem gegebenen tag
	 *
	 * @param string $tag - irgendein Datenbank-Spaltenname
	 */
	public static function getBlockEntryByTag($tag)
	{
		$selectQuery = "SELECT * FROM block WHERE fach = '" . $tag . "'";
		$selectResult = mysql_query($selectQuery);
	
		return mysql_fetch_assoc($selectResult);
	}
	
	/**
	 * getBlockEntryById - gibt eine formatierte Version des Blockeintrags aus
	 * 
	 * @param int $id
	 */
	public static function getBlockEntryById($id)
	{
		$selectQuery = "SELECT * FROM block WHERE id = '" . $id . "'";
		$selectResult = mysql_query($selectQuery);
		
		$resultArray = mysql_fetch_assoc($selectResult);
		
		if (!$resultArray)
		{
			$returnString = '';
		}
		else 
		{
			$returnString = "{$resultArray['fach']}<br />{$resultArray['raum']}<br />{$resultArray['lehrer']}";
		}
		return $returnString;
	}
	
	/**
	 * getPlanEntries - returns an array with all plan entries
	 */
	public static function getPlanEntries()
	{
		$selectQuery = "SELECT * FROM plan";
		$selectResult = mysql_query($selectQuery);

		$row = mysql_fetch_assoc($selectResult);
		
		if(!$row)
		{
			self::$planEntries[] = null;
		}
		else
		{
			self::$planEntries[] = $row;
		}	
		return self::$planEntries;
	}
		
	/**
	 * getPlanEntryByTag - gibt ein array des gewaehlten Planeintrags zurück ausgewaehlt nach einem gegebenen tag
	 *
	 * @param string $tag - irgendein Datenbank-Spaltenname
	 */
	public static function getPlanEntryByTag($tag = '*')
	{
		$selectQuery = "SELECT `" . $tag . "` FROM `plan`";
		$selectResult = mysql_query($selectQuery);

		$planEntryId =  mysql_fetch_array($selectResult);
		
		$blockSelectQuery = "SELECT * FROM block WHERE id = '" . $planEntryId[0] . "'";
		$blockSelectResult = mysql_query($blockSelectQuery);
		
		return mysql_fetch_assoc($blockSelectResult);
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
	
	/**
	 * clearPlan - leert die plan Tabelle
	 */
	public static function clearPlan()
	{
		$truncateQuery = "TRUNCATE `plan`";
		$truncateResult = mysql_query($truncateQuery);
		
		return true;
	}
}