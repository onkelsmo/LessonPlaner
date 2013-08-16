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
			case 'new':
				$innerView->setTemplate('new');
				$innerView->assign('headingBlock', 'Anlegen eines neuen Blocks');
				$innerView->assign('inputFachLabel', 'Fach');
				$innerView->assign('inputRaumLabel', 'Raum');
				$innerView->assign('inputLehrerLabel', 'Lehrer');
				$innerView->assign('headingBlock2Plan', 'Ordnen Sie einen Block dem Stundenplan zu.');
				$innerView->assign('chooseABlock', 'W&auml;hlen Sie einen Block und wann dieser stattfindet.');
				$innerView->assign('blockCreated', 'Block wurde angelegt.');
				$innerView->assign('block1', '1.Block');
				$innerView->assign('block2', '2.Block');
				$innerView->assign('block3', '3.Block');
				$innerView->assign('block4', '4.Block');
				break;
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