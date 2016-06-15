<?php 
class PagesController extends Controller{
	
	public $layout = 'admin';

	public function actionIndex(){

		$criteria 			= new CDbCriteria;
        $total 				= Pages::model()->count();

        $pages 				= new CPagination($total);
        $pages->pageSize 	= Yii::app()->params['itemsperpage'];
        $pages->applyLimit($criteria);

        $records 				= Pages::model()->findAll($criteria);

		$this->pageTitle  = 'Pages';
		$this->render('index',array(
			'records'	=> $records,
			'pages' 	=> $pages
			));

	}

	public function actionAdd(){

		if(isset($_POST['Pages'])){
			$model 								= new Pages;
			$model->attributes 					= $_POST['Pages'];
			$model->page_seo_meta_description 	= $_POST['Pages']['page_seo_meta_description'];
			$model->page_status 				= $_POST['Pages']['page_status'];
			if($model->save()){
				Yii::app()->user->setFlash('success', 'Page added successfully');
				$this->redirect(array('pages/index'));
			}
		}

		$this->pageTitle  = 'Add Page';
		$this->render('add', array(
				'model'=>new Pages
		));
	}

	public function actionUpdate($id=null){

		if(isset($_POST['Pages'])){
			$model 								= Pages::model()->findByPk($id);
			$model->attributes 					= $_POST['Pages'];
			$model->page_seo_meta_description 	= $_POST['Pages']['page_seo_meta_description'];
			$model->page_status 				= $_POST['Pages']['page_status'];
			if($model->update()){
				Yii::app()->user->setFlash('success', 'Page updated successfully');
				$this->redirect(array('pages/index'));
			}
		}

		$this->pageTitle  = 'Update Page';
		$this->render('update', array(
				'model'		=> new Pages,
				'record'	=> Pages::model()->findByPk($id)
		));
	}

	public function actionDelete($id=null){
		Pages::model()->deleteByPk($id);
		Yii::app()->user->setFlash('success', 'Page deleted successfully');
				$this->redirect(array('pages/index'));
	}


	public function actionSuspendrelease(){
		$id = $_POST['id'];
		$type = $_POST['type'];
		if($type == 1){
			Pages::model()->updateByPk($id, array('page_status' => 0));
			echo 'Published';
		}else{
			Pages::model()->updateByPk($id, array('page_status' => 1));
			echo 'Publish Later';
		}

	}
}