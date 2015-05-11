<?php

	namespace mbw\starter;
	
	class AdminController extends Controller
	{	
		function __construct()
		{
			add_action("admin_menu", array($this, "addToMenu"));
		}
		
		public function addToMenu()
		{
			add_menu_page("Plugin Starter", "Plugin Starter", "manage_options", "mbw_starter", array($this, "router"), "", "63");
		}
		
		public function router()
		{
			$this->authAdmin();
			
			if(isset($_GET["mbw_starter_action"])){
				$action = $_GET["mbw_starter_action"];
			} else {
				$action = "";
			}
	
			switch($action)
			{
				case "save":
					$this->save();
				break;
				default:
					$this->index();
				break;
			}
		}
		
		private function index($status = "")
		{
			$this->authAdmin();
			
			$data["nonce"] = wp_nonce_field(plugin_basename(__FILE__), "mbw_starter_nonce", true, false );
			$data["unescaped_display"] = get_option("mbw_starter_display");
			$data["unescaped_sample_text"] = get_option("mbw_starter_sample_text");
			$data["unescaped_status"] = $status;
			
			echo $this->loadView("admin-index", $data);
		}
		
		private function save()
		{
			$this->authAdmin();
			
			if (!wp_verify_nonce($_POST["mbw_starter_nonce"], plugin_basename(__FILE__))){
				return;
			}
			
			$display_sample_text = (isset($_POST["mbw_starter_display"])) ? 1 : 0;
			$sample_text = sanitize_text_field(stripslashes($_POST["mbw_starter_sample_text"]));
			
			update_option("mbw_starter_display", $display_sample_text);
			update_option("mbw_starter_sample_text", $sample_text);
			
			$this->index("Your changes were saved.");
		}
		
		private function authAdmin()
		{
			if (!current_user_can("manage_options"))
			{
				wp_die(__("You do not have sufficient permissions to access this page."));
			}
		}
	}
?>