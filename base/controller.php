<?php	
	namespace mbw\starter;

	class Controller
	{
		protected function loadView($view_name, $data = array())
		{
			extract($data);
		
			ob_start();
			
			require_once(plugin_dir_path(dirname(__FILE__)) . "views/{$view_name}.php");

			return ob_get_clean();
		}
	}
?>