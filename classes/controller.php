<?php
/**
*
* LessonPlaner - controller.php
* Kontrolliert was angezeigt wird
*
* @author SmO
* @since 07.08.2013
*
**/
namespace lessonPlaner;

class Controller
{
	// Attributes
	private $request = null;
	private $template = '';
	private $view = null;
	
	// Constructor
	public function __construct($request)
	{
		$this->view = new View();
		$this->request = $request;
		$this->template = !empty($request['view']) ? $request['view'] : 'default';
	}
	
	// Methods
	public function display()
	{		
		$innerView = new View();
		
		switch ($this->template)
		{
			case 'default':
			default:
				$innerView->setTemplate('default');
		}
		
		$this->view->setTemplate('lessonPlaner');
		$this->view->assign('title', 'Stundenplan Planer');
		$this->view->assign('heading', 'Stundenplan Planer');
		$this->view->assign('content', $innerView->loadTemplate());
		$this->view->assign('footer', 'Stundenplan Planer | by Jan Smolka | IT-11-c');
		
		return $this->view->loadTemplate();
	}
}

?>