<?php 
 class UsersController extends Controller{

 	public $layout = 'admin';

 	public function actionIndex(){

		$criteria 	= new CDbCriteria;
        $total 		= Business::model()->count();

        $pages 				= new CPagination($total);
        $pages->pageSize 	= Yii::app()->params['itemsperpage'];
        //$pages->pageSize 	= 5;
        $pages->applyLimit($criteria);

        $users = Business::model()->findAll($criteria);
        $this->pageTitle = 'Business Users';
 		$this->render('index',array(
 			'users'=>$users,
 			'pages' => $pages
 			));
 	}

 	public function actionView($id){
 		$this->pageTitle = 'View Business Users';
 		$data = Business::model()->findByPk($id);
 		$this->render('view',array('data'=>$data));
 	}


 	public function actionDelete($id){
 		Business::model()->deleteByPk($id);
 		Yii::app()->user->setFlash('success','User Deleted Successfully.');
 		$this->redirect(array('users/index'));
 	}

 	public function actionUpdate($id){
 		$this->pageTitle = 'Update Business Users';
 		if(isset($_POST["Business"])){
 			if($_POST['Business']['image']!=''){
 				$criteria = new CDbCriteria();
		 		$criteria->select = 'image';
		 		$criteria->condition = 'id='.$id;
		 		$userimage = Business::model()->find($criteria);
		 		if($userimage['image']!=''){
		 			@unlink(Yii::getPathOfAlias('webroot').'/images/temp/business/'.$userimage['image']); //removes the old image
		 			@copy(Yii::getPathOfAlias('webroot').'/images/temp/business/'.$_POST['Business']['image'], Yii::getPathOfAlias('webroot').'/images/business/'.$_POST['Business']['image']); //copies the new image from temp folder to mainfolder
					@unlink(Yii::getPathOfAlias('webroot').'/images/temp/business/'.$_POST['Business']['image']); //removes the temp image
		 		}
 			}
 			$model = Business::model()->findByPk($id);
 			if($model->validate()){
 				 $model->setAttributes($_POST['Business']);
 				 if ($model->save()) {
 				 	Yii::app()->user->setFlash('success','User Updated Successfully.');
                	$this->redirect(array('users/index'));
            	}
 			}else{
 				$errors = $model->getErrors();
 				echo '<pre>';print_r($errors);exit;
 			}
 		}

 		$this->render('update', array(
	 			'model'			=> new Business('update'),
	 			'userdetails'	=> Business::model()->findByPk($id),
	 			'businesstypes'	=> CHtml::listData(Businesstypes::model()->findAll(), 'type', 'type'),
				'zones'			=> CHtml::listData(Zones::model()->findAll(), 'zone', 'zone'),
				'districts' 	=> CHtml::listData(Districts::model()->findAll(), 'district', 'district')
 			));
 	}

 	public function actionCreateUserPassword($id){
 		if(isset($_POST['Business'])){
 			$model = Business::model()->findByPk($id);
 			//$model = new Business;
 			if($model->validate()){
 				$model->username = $_POST['Business']['username'];
 				$model->password = sha1($_POST['Business']['password']);
 				$model->orginal_password = $_POST['Business']['password'];

 				$model->updateByPk($id, array(
 					'username' 			=> $model->username,
 					'password' 			=> $model->password,
 					'orginal_password'	=> $model->orginal_password
 				));

				$message            	= new YiiMailMessage;
		        $message->view 			= "username_password_email";
		        $params              	= array('myMail'=>array('username'=> $model->username,'orginal_password'=> $model->orginal_password));
		        $message->subject    	= 'Username and password created for Neptrip';
		        $message->setBody($params, 'text/html');   
		        $message->addTo($model->email);
		        $message->from = 'noreply@neptrip.com';   
		        Yii::app()->mail->send($message);


 				Yii::app()->user->setFlash('success','Username and password updated successfully and email sent.');
 				$this->redirect(array('users/index'));
 			}else{
 				echo '<pre>';print_r($model->getErrors());exit;
 			}
 		}
	 		$criteria = new CDbCriteria();
			$criteria->select = "username,orginal_password";
			$criteria->condition = "id=$id";
			$userdetails = Business::model()->findAll($criteria);

 			$this->render('createuserpass', array('userdetails'=>$userdetails));
 	}

 	public function actionCreatePassword(){
 			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		    $pass = array(); //remember to declare $pass as an array
		    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		    for ($i = 0; $i < 8; $i++) {
		        $n = rand(0, $alphaLength);
		        $pass[] = $alphabet[$n];
		    }
		    echo implode($pass); //turn the array into a string
 	}

 	public function actionApprove($id){
 		$model = Business::model()->findByPk($id);
 		$model->status = 1;
 		$model->update();
 		if($model->update()){

 			$message            	= new YiiMailMessage;
        	$message->view 			= "accept_email_user";
        	$message->subject    	= 'Request accepted';
        	$message->setBody('text/html');                
        	$message->addTo($model->email);
        	$message->from 			= 'noreply@neptrip.com';   

        	Yii::app()->mail->send($message);

 			Yii::app()->user->setFlash('success','User approved successfully.');
 			$this->redirect(array('users/index'));	
 		}
 		
 	}

 	public function actionReject($id){
 		$model = Business::model()->findByPk($id);
 		$model->status = 2;
 		$model->update();
 		if($model->update()){
 			$message            	= new YiiMailMessage;
        	$message->view 			= "reject_mail_user";
        	$message->subject    	= 'Request rejected';
        	$message->setBody('text/html');                
        	$message->addTo($model->email);
        	$message->from 			= 'noreply@neptrip.com';   

        	Yii::app()->mail->send($message);
 			Yii::app()->user->setFlash('success','User rejected successfully.');
 			$this->redirect(array('users/index'));
 		}
 	}

 	public function actionUpload(){
            $tempFolder=Yii::getPathOfAlias('webroot').'/images/temp/business/';

            if(!file_exists($tempFolder) && !is_dir($tempFolder)) mkdir($tempFolder, 0777, TRUE);
			//if(!file_exists($tempFolder.'/chunks') && !is_dir($tempFolder.'/chunks')) mkdir($tempFolder.'/chunks', 0777, TRUE);

            Yii::import("ext.EFineUploader.qqFileUploader");

            $uploader = new qqFileUploader();
            $uploader->allowedExtensions = array('jpg','jpeg');
            $uploader->sizeLimit = 2 * 1024 * 1024;//maximum file size in bytes
            //$uploader->chunksFolder = $tempFolder.'chunks';

            $result = $uploader->handleUpload($tempFolder);
            $result['filename'] = $uploader->getUploadName();
            //$result['folder'] = $webFolder;

            $uploadedFile=$tempFolder.$result['filename'];

            header("Content-Type: text/plain");
            $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
            echo $result;
            Yii::app()->end();
    }

 }