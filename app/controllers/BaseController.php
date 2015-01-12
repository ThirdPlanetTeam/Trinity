<?php

class BaseController extends Controller {

	public $layout = 'layout';

	/**
	 * The default theme.
	 *
	 * @var string
	 */
	protected $theme = 'default';

	/**
	 * Create the base controller instance.
	 *
	 * @return BaseController
	 */
	public function __construct()
	{
		$this->theme = Config::get('game.theme');
		
		// Redirect to /install if the db isn't setup.
		/*if (Config::get("wardrobe.installed") !== true)
		{
			header('Location: install');
			exit;
		}*/
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{	
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->getLayout(), ['content' => '']);
		}
	}

	public function nest($file, $params = [])
	{
		$this->layout->nest('content', $this->getTheme().".".$file, $params);
	}

	public function getLayout() {
		return $this->getTheme().'.'.$this->layout;
	}

	public function getTheme() {
		return 'themes.'.$this->theme;
	}	
}
