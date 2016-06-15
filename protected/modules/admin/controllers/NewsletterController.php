<?php
class NewsletterController extends Controller{
	public $layout = 'admin';

	public function actionIndex(){

		$criteria = new CDbCriteria;
        $total = Newsletters::model()->count();
 
        $pages = new CPagination($total);
        $pages->pageSize = Yii::app()->params['itemsperpage'];
        $pages->applyLimit($criteria);

        $newsletters = Newsletters::model()->findAll($criteria);


		$this->pageTitle = 'Newsletter';
		$this->render('index',array(
			'newsletters' => $newsletters,
			'pages'		 => $pages	
		));
	}

	public function actionAdd(){
		if(isset($_POST['Newsletters'])){
			$model 				= new Newsletters;
			$model->attributes 	= $_POST['Newsletters'];
			if($model->validate()){
				$model->save();
				Yii::app()->user->setFlash('success', "Newsletter added successfully");
				$this->redirect(array('newsletter/index'));
			}
		}		
		$this->pageTitle = 'Add Newsletter';
		$this->render('add',array(
			'model'=>  new Newsletters
		));
	}

	public function actionUpdate($id=null){		
		if(isset($_POST['Newsletters'])){
			$model 				= Newsletters::model()->findByPk($id);
			$model->attributes 	= $_POST['Newsletters'];
			if($model->validate()){
				$model->update();
				Yii::app()->user->setFlash('success', "Newsletter updated successfully");
				$this->redirect(array('newsletter/index'));
			}
		}

		$this->pageTitle = 'Edit Newsletter';
		$this->render('update',array(
				'record' => Newsletters::model()->findByPk($id),
				'model'=>  new Newsletters
			));
	}

	public function actionDelete($id=null){
		Newsletters::model()->deleteByPk($id);
		Yii::app()->user->setFlash('success', "Newsletter deleted successfully");
		$this->redirect(array('newsletter/index'));
	}

	public function actionSuspendrelease(){
		$id = $_POST['id'];
		$type = $_POST['type'];
		if($type == 1){
			Newsletters::model()->updateByPk($id, array('status' => 0));
			echo 'Published';
		}else{
			Newsletters::model()->updateByPk($id, array('status' => 1));
			echo 'Publish Later';
		}

	}

}