<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		// $users=array(
		// 	// username => password
		// 	 'demo'=>'demo',
		// 	 'admin'=>'admin',
		// );
		
		  $record = Business::model()->findByAttributes(array('username'=>$this->username,'status'=>1)); 
            if($record===null)
            { 
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            }
            else if($record->password!==sha1($this->password))            // here I compare db password with password field
            { 
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }
            else
            {  
                $this->setState('user_id',$record->id);
                $this->setState('is_loggedIn', true);
                $this->setState('user_type', 'user');
                $this->errorCode=self::ERROR_NONE;
            }
            return !$this->errorCode;
	}
}