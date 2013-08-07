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
		$this->view->setTemplate('theBlog');
		$this->view->assign('blog_titel', 'Der Titel des Blogs');
		$this->view->assign('blog_footer', 'Ein Blog von und mit MVC');
		//$this->view->assign('blog_content', $innerView->loadTemplate());
		return $this->view->loadTemplate();
	}
}

?>