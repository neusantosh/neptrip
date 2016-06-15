<?php
/**
 * 
 * @version 1.0
 */
 

class AjaxUploaderModule extends CWebModule
{
	public $folder;
	
	public $userModel;  //the model of the user
	
	public $userPixColumn;  //the column to save the picture filename
	/**
	 * 
	 */
	public function beforeControllerAction($controller, $action) 
	{
		if (parent::beforeControllerAction($controller, $action)) {
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}


	

	/**
	 * Returns the module version number.
	 * @return string the version.
	 */
	public function getVersion()
	{
		return '1.0';
	}
}
