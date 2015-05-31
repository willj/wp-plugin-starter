<?php	
	namespace mbw\starter;
	
	class SampleController extends Controller
	{
		public function __construct()
		{
			add_shortcode("mbw_starter_text", array($this, "showText"));	
		}
		
		public function showText()
		{
			if (!$this->shouldShowText()){
				return;
			}
			
			$data["unescaped_sample_text"] = get_option("mbw_starter_sample_text");
			
			return $this->loadView("sample", $data);
		}
		
		private function shouldShowText()
		{		
			return (bool)get_option("mbw_starter_display");
		}
	}
?>