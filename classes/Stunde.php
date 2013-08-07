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
	protected $lehrer = '';
	protected $fach = '';
	protected $raum = '';
	
	
	
	public function __construct($lehrer, $fach, $raum)
	{
		$this->lehrer = $lehrer;
		$this->fach = $fach;
		$this->raum = $raum;
	}
	
	
}