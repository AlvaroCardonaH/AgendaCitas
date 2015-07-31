<?php



class UserIdentity extends CUserIdentity {
	/**
	 * @var integer id of logged user
	 */
      //inherited constants,good to know.
  /*  const ERROR_NONE=0;
    	const ERROR_USERNAME_INVALID=1;
    	const ERROR_PASSWORD_INVALID=2;
    	const ERROR_UNKNOWN_IDENTITY=100;*/
   const ERROR_INACTIVE=3;
	private $_id;

	/**
	 * Authenticates username and password
	 * @return boolean CUserIdentity::ERROR_NONE if successful authentication
	 */
	public function authenticate() {
		//$attribute = strpos($this->username, '@') ? 'email' : 'username';
                $attribute = 'username';
		$user = User::model()->find(array('condition' => $attribute . '=:loginname', 'params' => array(':loginname' => $this->username)));

                $this->errorCode = 0;
                
		if ($user === null) {
                    $this->errorCode = self::ERROR_USERNAME_INVALID;
		} 
                else{
                    
                    if (!$user->verifyPassword($this->password)) {
                        $this->errorCode = self::ERROR_PASSWORD_INVALID;
                    }
                    else if ($user->Activo==User::STATUS_INACTIVE) {
                        $this->errorCode = self::ERROR_INACTIVE;
                    }  
                    
                    if ($this->errorCode == 0){
                        $this->_id = $user->IdUsuario;
                    }
                } 
                    
		return !$this->errorCode;
	}

	/**
	 * Creates an authenticated user with no passwords for registration
	 * process (checkout)
	 * @param string $username
	 * @return self
	 */
	public static function createAuthenticatedIdentity($id, $username) {
		$identity = new self($username, '');
		$identity->_id = $id;
		$identity->errorCode = self::ERROR_NONE;
		return $identity;
	}

	/**
	 *
	 * @return integer id of the logged user, null if not set
	 */
	public function getId() {
		return $this->_id;
	}
}