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
		
		protected function authAdmin()
		{
			if (!current_user_can("manage_options"))
			{
				wp_die(__("You do not have sufficient permissions to access this page."));
			}
		}
	}
?>