<?php

class RegisterController extends Controller
{
	public function actionIndex()
	{
		if(isset($_POST['Business'])){
			if($_POST['Business']['image']!=''){
				@copy(Yii::getPathOfAlias('webroot').'/images/temp/business/'.$_POST['Business']['image'], Yii::getPathOfAlias('webroot').'/images/business/'.$_POST['Business']['image']);
				@unlink(Yii::getPathOfAlias('webroot').'/images/temp/business/'.$_POST['Business']['image']);
			}

			$model 				= new Business('register');
			$model->attributes  = $_POST['Business'];
			$model->save();
			if($model->validate()){
				if($model->save()){
					$id 					= $model->id;
					$message            	= new YiiMailMessage;
			        $message->view 			= "register_email";
			        $params              	= array('myMail'=>Business::model()->findByPk($id));
			        $message->subject    	= 'User registered action required';
			        $message->setBody($params, 'text/html');                
			        $message->addTo(Yii::app()->params['adminEmail']);
			        $message->from = 'noreply@neptrip.com';   
			        Yii::app()->mail->send($message);


			        $message1            	= new YiiMailMessage;
			        $message1->view 		= "register_email_user";
			        $message1->subject    	= 'You have registered in Neptrip';
			        $message1->setBody('text/html');                
			        $message1->addTo($model->email);
			        $message1->from 		= 'noreply@neptrip.com';   
			        Yii::app()->mail->send($message1);

					Yii::app()->user->setFlash('success', "User registered sucessfully. Please check your email.");
					$this->redirect(array('register/index'));
				}
			}else{
				$errors = $model->getErrors();
				if(!empty($errors['email'][0])){
					Yii::app()->user->setFlash('info', $errors['email'][0]);
				}

				if(!empty($errors['business_name'][0])){
					Yii::app()->user->setFlash('error', $errors['business_name'][0]);
				}

				$this->redirect(array('register/index'));
			}
		}

		$this->render('index',array(
				'model'			=> new Business('register'),
				'businesstypes'	=> CHtml::listData(Businesstypes::model()->findAll(), 'type', 'type'),
				'zones'			=> CHtml::listData(Zones::model()->findAll(), 'zone', 'zone'),
				'districts' 	=> CHtml::listData(Districts::model()->findAll(), 'district', 'district')
		));
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