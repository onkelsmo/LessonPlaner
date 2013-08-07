<?php
/**
 * 
 * LessonPlaner - Stunde.php
 *  
 * @author smo
 * @since 07.08.2013
 * 
 */
namespace lessonPlaner;

class Stunde
{
	// Attributes
	private $lehrer = '';
	private $fach = '';
	private $raum = '';
	
	// Properties
	// getter
	public function _getLehrer()
	{
		return $this->lehrer;
	}
	public function _getFach()
	{
		return $this->fach;
	}
	public function _getRaum()
	{
		return $this->raum;
	}
	// setter
	private function _setLehrer($lehrer)
	{
		if (!is_string($lehrer))
		{
			throw new \Exception('Lehrer muss ein String sein!');
		}
		else 
		{
			$this->lehrer = $lehrer;
		}
	}
	private function _setFach($fach)
	{
		if (!is_string($fach))
		{
			throw new \Exception('Fach muss ein String sein!');
		}
		else
		{
			$this->fach = $fach;
		}
	}
	private function _setRaum($raum)
	{
		if (!is_string($raum))
		{
			throw new \Exception('Raum muss ein String sein!');
		}
		else
		{
			$this->raum = $raum;
		}
	}
	
	public function __construct($lehrer, $fach, $raum)
	{
		$this->_setLehrer($lehrer);
		$this->_setFach($fach);
		$this->_setRaum($raum);
	}
	
	
}