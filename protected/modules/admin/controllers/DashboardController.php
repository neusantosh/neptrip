<?php
class DashboardController extends Controller
{	
	public $layout = 'admin';
	public function actionIndex()
	{
		$this->pageTitle  = 'Dashboard';
		$this->render('index');
	}
}