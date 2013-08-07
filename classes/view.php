<?php
/**
*
* LessonPlaner - view.php
*
* @author SmO
* @since 07.08.2013
*
**/
namespace lessonPlaner;

class View
{
	// Pfad zum Template
	private $path = 'templates';
	
	// Name des Template
	private $template = 'default';
	
	/**
	 * Enthält die Variablen, die in das Template eingebettet werden
	 */
	private $_ = array();
	
	/**
	 * Ordnet einer Variablen einen bestimmten Schluessel zu
	 * 
	 * @param String $key Schluessel
	 * @param String $value Variable
	 */
	public function assign($key, $value)
	{
		$this->_[$key] = $value;
	}
	
	/**
	 * Setzt den Namen des Templates
	 * 
	 * @param String $template
	 */
	public function setTemplate($template = 'default')
	{
		$this->tempate = $template;
	}
	
	/**
	 *
	 * Das Template-File laden und zurueckgeben
	 *
	 * @param string $tpl Der Name des Template-Files (falls es nicht vorher über steTemplate() zugewiesen wurde).
	 *
	 * @return string Der Output des Templates.
	 *
	 */
	public function loadTemplate()
	{
		$tpl = $this->template;
	
		// Pfad zum Template erstellen und ueberpruefen, ob das Template existiert
		$file = $this->path . DIRECTORY_SEPARATOR . $tpl . '.php';
		$exists = file_exists($file);
	
		if($exists)
		{
			// Der Output des Scripts wird n einen Buffer gespeichert, d.h. nicht gleich ausgegeben.
			ob_start();
				
			// Das Template-File wird eingebunden und dessen Ausgabe in $output gespeichert.
			include $file;
			$output = ob_get_contents();
			ob_end_clean();
	
			// Output zurückgeben
			return $output;
		}
		else
		{
			// Templatefile existiert nicht -> Fehlermeldung
			throw new \Exception('<strong>Fehler:</strong><br /> Template nicht gefunden!');
		}
	}
}

?>