<?php 
class MyComponent extends CApplicationComponent{
	

	public function check_login(){
		    $user_id =  Yii::app()->session['user_id'];
		    $isLoggedin = Yii::app()->session['is_loggedIn'];
		    if(!($user_id)){
		    	return 'usernotloggedin';
		    }
	}
}