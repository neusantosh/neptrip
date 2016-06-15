<?php
class Uploader extends CWidget
{
		
	/**
	 * @var boolean whether to force copying of assets.
	 * Useful during development and when upgrading the module.
	 */
	public $forceCopyAssets = true;


	private $_assetsUrl;

	/**
	 * Initializes the module.
	 */
	public function init()
	{		

		$this->registerCss();
		$this->registerJS();	
	}

	/**
	 * Registers the module CSS.
	 */
	public function registerCss()
	{
		Yii::app()->clientScript->registerCssFile($this->getAssetsUrl() . '/style/style.css');
	}
	
	protected function registerJS()
	{
		/** @var CClientScript $cs */
		$cs = Yii::app()->getClientScript();	
		$cs->registerScriptFile($this->getAssetsUrl().'/js/processupload.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.form.js',CClientScript::POS_HEAD );
	}

	
	/**
	 * Returns the URL to the published assets folder.
	 * @return string the URL.
	 */
	protected function getAssetsUrl()
	{
		if (isset($this->_assetsUrl))
			return $this->_assetsUrl;
		else
		{
			$assetsPath = Yii::getPathOfAlias('ajaxuploader.assets');
			$assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, $this->forceCopyAssets);

			return $this->_assetsUrl = $assetsUrl;
		}
	}
	
	public function run()
	{
		$this->renderContent();
	}
	
	public function renderContent()
	{
		$model =  new UploadModel;
		$this->render('uploadform', array('model'=>$model));
	}
}