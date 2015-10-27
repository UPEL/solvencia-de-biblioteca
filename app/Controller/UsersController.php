<?php class UsersController extends AppController {

	/**
	 * Here we set array with all public functions names, that client has access, This is CakePHP function. Check docs for more details.
	 */
	public function beforeFilter(){

		$this->{'Auth'}->allow(array(
			'in',
			'add',
			'recoverAccount',
			'verifyEmailAddress',
			'sendEmailAgain',
			'setNewPassword',
			'newPasswordRequest',
			'recoverAccount',
			'checkEmail',
		));
		parent::beforeFilter();
	}

	/**
	 * signIn, register, recoverAccount, view forms.
	 */
	public function login(){
		if($this->{'Auth'}->login()){
			$this->{'redirect'}('/');
		}
		$this->response->disableCache();
	}

	public function logout(){
		$this->{'Auth'}->logout();
		$this->{'redirect'}('/login');
	}

	private function responseMessages($type,$I18n){

		if(!$I18n){
			$I18n = 'us_EN';
		}

		$messages = array(
			'alreadyVerified'=>array(
				'us_EN'=>'This account is already verified.',
				'es_VE'=>'Esta cuenta ya esta verificada.'
			),
			'banned'=>array(
				'us_EN'=>'This account was banned.',
				'es_VE'=>'Esta cuenta fue inhabilitada.'
			),
			'cannotSetNewParameters'=>array(
				'us_EN'=>'An unexpected error occurred.',
				'es_VE'=>'Ocurrió un error inesperado.'
			),
			'cannotSaveNewUser'=>array(
				'us_EN'=>'An unexpected error occurred.',
				'es_VE'=>'Ocurrió un error inesperado.'
			),
			'cannotSetNewPassword'=>array(
				'us_EN'=>'An unexpected error occurred.',
				'es_VE'=>'Ocurrió un error inesperado.'
			),
			'emailNotVerified'=>array(
				'us_EN'=>'The email is not verified.',
				'es_VE'=>'El correo electrónico no se ha verificado.'
			),
			'emailNotSend'=>array(
				'us_EN'=>'An unexpected error occurred.',
				'es_VE'=>'Ocurrió un error inesperado.'
			),
			'invalidData'=>array(
				'us_EN'=>'Invalid request.',
				'es_VE'=>''
			),
			'passwordDoesNotMatch'=>array(
				'us_EN'=>'The password does not match.',
				'es_VE'=>'La contraseña no coincide.'
			),
			'requestAccepted'=>array(
				'us_EN'=>'',
				'es_VE'=>''
			),
			'suspended'=>array(
				'us_EN'=>'This account was suspended.',
				'es_VE'=>'Esta cuenta fue suspendida.'
			),
			'theLinkIsInvalid'=>array(
				'us_EN'=>'',
				'es_VE'=>''
			),
			'theKeyIsInvalid'=>array(
				'us_EN'=>'',
				'es_VE'=>''
			),
			'userAlreadyExist'=>array(
				'us_EN'=>'The user already exist.',
				'es_VE'=>'El usuario ya existe.'
			),
			'userNotExist'=>array(
				'us_EN'=>'This email does not exist in our database.',
				'es_VE'=>'No hay nadie asociado con tal correo electrónico. Por favor verifique e inténtelo de nuevo.'
			),
			'unexpectedError'=>array(
				'us_EN'=>'An unexpected error occurred.',
				'es_VE'=>'Se ha producido un error inesperado.'
			)
		);

		return $messages[$type][$I18n];
	}

	/**
	 * Example code to use Google reCaptcha
	 * */
//	public function addQuestion(){
//		$this->layout = null;
//		$request    = $this->{'request'}->input('json_decode',true);
//
//		// Set default
//		$response   = array(
//			'httpResponseIsOk'  => false,
//			'reCaptcha'         => 'invalid',
//			'saveStatus'        => 'fail',
//			'data'              => array()
//		);
//
//		// http request to validate the reCaptcha;
//		$HttpSocket = new HttpSocket();
//		$data = array(
//			'secret' => '6Ld3Lg0TAAAAAI-Tme8Qnc8GkzcR9tAERDacLmNb',
//			'response' => $request['reCaptcha']['response']
//		);
//		$reCaptchaResponse = $HttpSocket->post('https://www.google.com/recaptcha/api/siteverify', $data);
//
//		if($reCaptchaResponse->isOk()){
//			$response['httpResponseIsOk'] = true;
//
//			$reCaptchaResponseAsJSON    = json_decode($reCaptchaResponse->body);
//			$reCaptchaResponseAsArray   = (array) $reCaptchaResponseAsJSON;
//
//			if($reCaptchaResponseAsArray['success']){
//				$response['reCaptcha'] = 'valid';
//
//				$pregunta =	array(
//					'Pregunta'=>Array
//					(
//						'curso_id'        => $request['id'],
//						'fecha_pregunta'  => $request['date'],Z
//						'pregunta'        => $request['question'],
//						'host_ip'         => $this->request->clientIp(true),
//						'referer'		  => $this->referer()
//					)
//				);
//
//				if($this->{'Pregunta'}->save($pregunta,false)){
//					$response['saveStatus'] = 'success';
//					$response['data'] = $this->{'Pregunta'}->read();
//				}
//
//			}
//		}
//
//		$this->{'set'}('return',$response);
//		$this->render('/Elements/ajax_view');
//	}

	/**
	 *  Login Ajax action. Sign in method.
	 */
	public function in(){
		$this->layout = null;
		$request    = $this->{'request'}->input('json_decode',true);

		$options = array(
			'conditions' => array(
				'User.email' 		=> $request['email'],
			)
		);

		$user = $this->{'User'}->find('first',$options);

		if($user){
			$passwordHash = Security::hash($request['password'], 'blowfish', $user['User']['password']);

			// checks that the user password match
			if($passwordHash === $user['User']['password']){
				// checks that the user is not banned
				if(!$user['User']['banned']){
					// checks that the user is not suspended
					if(!$user['User']['suspended']){
						// checks that the user has email already verified
						if($user['User']['email_verified']){
							if($this->{'Auth'}->login($user)){
								$response['status'] = 'success';
							}else{
								$response['status'] 		= 'error';
								$response['message'] 		= $this->responseMessages('unexpectedError','es_VE');
								$response['messageType'] 	= 'unexpectedError';
							}
						}else{
							$response['status'] = 'error';
							$response['message'] 		= $this->responseMessages('emailNotVerified','es_VE');
							$response['messageType'] 	= 'emailNotVerified';
						}
					}else{
						$response['status'] = 'error';
						$response['message'] 		= $this->responseMessages('suspended','es_VE');
						$response['messageType'] 	= 'suspended';
					}
				}else{
					$response['status'] = 'error';
					$response['message'] 		= $this->responseMessages('banned','es_VE');
					$response['messageType'] 	= 'banned';
				}
			}else{
				$response['status'] = 'error';
				$response['message'] 		= $this->responseMessages('passwordDoesNotMatch','es_VE');
				$response['messageType'] 	= 'passwordDoesNotMatch';
			}
		}else{
			$response['status'] = 'error';
			$response['message'] 		= $this->responseMessages('userNotExist','es_VE');
			$response['messageType'] 	= 'userNotExist';
		}

		$this->{'set'}('response',$response);
		$this->render('/Elements/ajax_view');
	}

	/**
	 * Is GET action, and its role is: Verify email address of the new user
	 *
	 * Process JSON object which has 2 elements:
	 * 	(id)		=> Is uuid UserId;
	 *	(key)		=> Is uuid temp key, is related to temp_password which is hash based on that key, is processed for Security::hash blowfish pipeline, and is used to verify the user account.
	 *
	 */
	public function verifyEmailAddress(){
		$request = $this->{'request'}->params;

		$options = array(
			'conditions' => array(
				'User.id' 		=> $request['id'],
			)
		);

		$user = $this->{'User'}->find('first',$options);

		// checks that the user exist
		if($user){
			// checks that the email is not verified
			if(!$user['User']['email_verified']){

				$tempPasswordHash = Security::hash($request['key'], 'blowfish', $user['User']['temp_password']);

				if($tempPasswordHash===$user['User']['temp_password']){
					$data =	array(
						'User'=>Array
						(
							'id'=>$user['User']['id'],
							'email_verified' =>	1,
						)
					);

					if($this->{'User'}->save($data)){
						$response['status'] = 'success';
					}else{
						$response['status']  = 'error';
						$response['message'] = 'cannotSetNewParameters';
						$response['message'] = $this->responseMessages('cannotSetNewParameters','es_VE');
					}
				}else{
					$response['status']   = 'error';
					$response['message']  = 'theLinkIsInvalid';
					$response['message'] 	= $this->responseMessages('theLinkIsInvalid','es_VE');
				}
			}else{
				$response['status']       = 'error';
				$response['message'] 		= $this->responseMessages('alreadyVerified','es_VE');
				$response['messageType'] 	= 'alreadyVerified';
			}
		}else{
			$response['status']       = 'error';
			$response['message'] 		= $this->responseMessages('userNotExist','es_VE');
			$response['messageType'] 	= 'userNotExist';
		}

		$this->{'set'}('data',$response);
	}

	/**
	 * Send email to verify email address
	 * @param String [$email] email
	 * @param String [$userId] userId
	 * @param String [$publicKey] publicKey
	 * @return Boolean
	 **/
	private function sendEmailToVerifyEmailAddress($email, $userId, $publicKey){
		$Email = new CakeEmail('default');
		$Email->template('verifyEmail', 'verifyEmail');
		$Email->viewVars(array('userId' => $userId,'publicKey'=>$publicKey));
		$Email->emailFormat('both');
		$Email->from(array('servicios-estudiantiles-upel@ipm.upel.edu.ve' => 'ipm.upel.edu.ve'));
		$Email->to($email);
		$Email->subject('UPEL - Verifique su dirección de correo electrónico');
		return $Email->send();
	}

	/**
	 * Send email to set new password
	 * @param String [$email] email
	 * @param String [$userId] userId
	 * @param String [$publicKey] publicKey
	 * @return Boolean
	 **/
	private function sendEmailToSetNewPassword($email, $userId, $publicKey){
		$Email = new CakeEmail('default');
		$Email->template('passwordHasBeenChanged', 'passwordHasBeenChanged');
		$Email->viewVars(array('userId' => $userId,'publicKey'=>$publicKey));
		$Email->emailFormat('both');
		$Email->from(array('servicios-estudiantiles-upel@ipm.upel.edu.ve' => 'ipm.upel.edu.ve'));
		$Email->to($email);
		$Email->subject('UPEL - Su clave ha sido cambiada');
		return $Email->send();
	}

	/**
	 * Send email to set new password
	 * @param String [$email] email
	 * @param String [$userId] userId
	 * @param String [$publicKey] publicKey
	 * @return Boolean
	 **/
	private function sendEmailToRecoverUserAccount($email, $userId, $publicKey){
		$Email = new CakeEmail('default');
		$Email->template('newPasswordRequest', 'newPasswordRequest');
		$Email->viewVars(array('userId' => $userId,'publicKey'=>$publicKey));
		$Email->emailFormat('both');
		$Email->from(array('servicios-estudiantiles-upel@ipm.upel.edu.ve' => 'ipm.upel.edu.ve'));
		$Email->to($email);
		$Email->subject('UPEL - Establecer una nueva clave');
		return $Email->send();
	}

	/**
	 * Is AJAX-POST action, and its role is: Send email AGAIN to verify email address
	 *
	 * Process JSON object which has 1 elements:
	 * 	(email) => Email of user account
	 *
	 */
	public function sendEmailAgain(){
		$request = $this->{'request'}->input('json_decode',true);
		$response = array();

		$options = array(
			'conditions' => array(
				'User.email' 		=> $request['email'],
			)
		);

		$user = $this->{'User'}->find('first',$options);

		// checks that the user exist
		if($user){

			// checks that the email is not verified
			if(!$user['User']['email_verified']){
				$publicKey	 	= CakeText::uuid();
				$privateKeyHash = Security::hash($publicKey);

				$data =	array(
					'User'=>Array
					(
						'id'			=> $user['User']['id'],
						'temp_password'	=> $privateKeyHash
					)
				);

				if($this->{'User'}->save($data)){

					if($this->inProduction){
						$userData = $this->{'User'}->read();

						if ($this->sendEmailToVerifyEmailAddress($userData['User']['email'], $userData['User']['id'], $publicKey)) {
							$response['status'] = 'success';
						}else{
							$response['status'] = 'error';
							$response['message'] = 'email-not-send';
						}
					}else{
						$response['status'] = 'success';
					}

				}else{
					$response['status']       = 'error';
					$response['message'] 		= $this->responseMessages('cannotSetNewParameters','es_VE');
					$response['messageType'] 	= 'cannotSetNewParameters';
				}
			}else{
				$response['status']       = 'error';
				$response['message'] 		= $this->responseMessages('alreadyVerified','es_VE');
				$response['messageType'] 	= 'alreadyVerified';
			}
		}else{
			$response['status']       = 'error';
			$response['message'] 		= $this->responseMessages('userNotExist','es_VE');
			$response['messageType'] 	= 'userNotExist';
		}

		$this->{'set'}('response',$response);
		$this->render('/Elements/ajax_view');
	}

	/**
	 * Is AJAX-POST action, and its role is Add new user
	 *
	 * Process JSON object  which has 4 elements:
	 * (names) => Name of user account
	 * (lastNames) => last name of user account
	 * (email) => Email of user account
	 * (password) => Password of user account
	 *
	 */
	public function add(){
		$this->layout = null;
		$request = $this->{'request'}->input('json_decode',true);
		$response = array();

		$this->{'User'}->set($request);
		if($this->{'User'}->validates()){

			$options = array(
				'conditions' => array(
					'User.email' 		=> $request['email'],
				)
			);

			$user = $this->{'User'}->find('first',$options);

			// checks that the user does not exist
			if(!$user){
				Security::setHash('blowfish');
				$passwordHash = Security::hash($request['password']);

				$publicKey	 	= CakeText::uuid();
				$privateKeyHash = Security::hash($publicKey);

				$data =	array(
					'User'=>Array
					(
						'names'					=>	$request['names'],
						'lastNames'	            =>	$request['lastNames'],
						'email'					=>	$request['email'],
						'emailVerified'		=>	1,                      // in production set to 0
						'password'				=>	$passwordHash,
						'tempPassword'			=>	$privateKeyHash,
						'banned'				=>	0,
					)
				);

				if($this->{'User'}->save($data)){

					if($this->inProduction){
						$userData = $this->{'User'}->read();

						if ($this->sendEmailToVerifyEmailAddress($userData['User']['email'], $userData['User']['id'], $publicKey)) {
							$response['status'] = 'success';
						}else{
							$response['status']       = 'error';
							$response['message'] 		= $this->responseMessages('emailNotSend','es_VE');
							$response['messageType'] 	= 'emailNotSend';
						}
					}else{
						$response['status'] = 'success';
					}

				}else{
					$response['status']       = 'error';
					$response['message'] 		= $this->responseMessages('cannotSaveNewUser','es_VE');
					$response['messageType'] 	= 'cannotSaveNewUser';
				}
			}else{
				$response['status']       = 'error';
				$response['message'] 		= $this->responseMessages('userAlreadyExist','es_VE');
				$response['messageType'] 	= 'userAlreadyExist';
			}
		}else{
			$response['status']       = 'error';
			$response['message'] 		= $this->responseMessages('invalidData','es_VE');
			$response['messageType'] 	= 'invalidData';
		}

		$this->{'set'}('response',$response);
		$this->render('/Elements/ajax_view');
	}


	/**
	 * Is AJAX-POST action, and its role is: seed if email is already in database
	 *
	 * Process JSON object which has 2 elements:
	 *	(UserEmail)			=> Email to check in database
	 *	(inverse_result)	=> If you want received inverse result
	 *
	 */
	public function checkEmail(){
		$this->layout = null;
		$request = $this->{'request'}->data;
		$response = false;

		$userEmailConditions = array(
			'conditions' => array('User.email' => $request['email']),
		);

		$email = $this->{'User'}->find('first',$userEmailConditions);

		if(isset($request['inverse_result'])){
			$inverse_result =  $request['inverse_result'];
			if($inverse_result){
				if(!$email){
					$response = true;
				}else{
					$response = false;
				}
			}
		}else{
			if($email){
				$response = true;
			}else{
				$response = false;
			}
		}

		$this->{'set'}('response',$response);
		$this->render('/Elements/ajax_view');
	}


	/**
	 *  Is AJAX-POST action, and its role is: Set new password
	 *
	 * Process JSON object which has 2 elements:
	 *	(id)		=> Is uuid UserId;
	 *	(key)		=> Is uuid temp key, is related to temp_password which is hash based on that key, is processed for Security::hash blowfish pipeline, and is used to verify the user account.
	 *	(password)	=> Is the new password
	 *
	 */
	public function setNewPassword(){
		$this->layout = null;
		$request = $this->{'request'}->input('json_decode',true);
		$response = array();

		$options = array(
			'conditions' => array(
				'User.id' 		=> $request['id'],
			)
		);

		$user = $this->{'User'}->find('first',$options);

		// checks that the user exist
		if($user){
			$tempPasswordHash = Security::hash($request['key'], 'blowfish', $user['User']['temp_password']);

			if($tempPasswordHash===$user['User']['temp_password']){
				Security::setHash('blowfish');
				$passwordHash = Security::hash($request['password']);

				$publicKey	 	= CakeText::uuid();
				$privateKeyHash = Security::hash($publicKey);

				$data =	array(
					'User'=>Array
					(
						'id'			=>	$user['User']['id'],
						'password'		=>	$passwordHash,
						'temp_password'	=>	$privateKeyHash,
					)
				);

				if($this->{'User'}->save($data)){

					if($this->inProduction){
						$userData = $this->{'User'}->read();

						if ($this->sendEmailToSetNewPassword($userData['User']['email'], $userData['User']['id'], $publicKey)) {
							$response['status'] = 'success';
						}else{
							$response['status'] = 'error';
							$response['message'] = 'email-not-send';
						}
					}else{
						$response['status'] = 'success';
					}

				}else{
					$response['status']       = 'error';
					$response['message'] 		= $this->responseMessages('cannotSetNewPassword','es_VE');
					$response['messageType'] 	= 'cannotSetNewPassword';
				}
			}else{
				$response['status'] 	    = 'error';
				$response['message'] 		= $this->responseMessages('theKeyIsInvalid','es_VE');
				$response['messageType'] 	= 'theKeyIsInvalid';
			}
		}else{
			$response['status'] 	    = 'error';
			$response['message'] 		= $this->responseMessages('userNotExist','es_VE');
			$response['messageType'] 	= 'userNotExist';
		}

		$this->{'set'}('response',$response);
		$this->render('/Elements/ajax_view');
	}



	/**
	 * Is GET action, and its role is: Accept or not, set new password, if pass the test, the user will be able to see the form and set new password.
	 *
	 * Process JSON object which has 2 elements:
	 *	(id)	=> Is uuid UserId;
	 *	(key)	=> Is uuid temp key, is related to temp_password which is hash based on that key, is processed for Security::hash blowfish pipeline, and is used to verify the user account.
	 *
	 */
	public function  newPasswordRequest(){
		$request = $this->{'request'}->params;

		$options = array(
			'conditions' => array(
				'User.id' 		=> $request['id'],
			)
		);

		$user = $this->{'User'}->find('first',$options);

		// checks that the user exist
		if($user){
			$tempPasswordHash = Security::hash($request['key'], 'blowfish', $user['User']['temp_password']);
			if($tempPasswordHash===$user['User']['temp_password']){
				$response['status'] 	= 'success';
				$response['message']	= 'request-accepted';
				$response['id']       = $request['id'];
				$response['key']      = $request['key'];
			}else{
				$response['status'] 	    = 'error';
				$response['message'] 		= $this->responseMessages('theLinkIsInvalid','es_VE');
				$response['messageType'] 	= 'theLinkIsInvalid';
			}
		}else{
			$response['status'] 	    = 'error';
			$response['message'] 		= $this->responseMessages('userNotExist','es_VE');
			$response['messageType'] 	= 'userNotExist';
		}

		$this->{'set'}('data',$response);
	}

	/**
	 * Is AJAX-POST action, and its role is: Recover user account.
	 *
	 * Process JSON object  which has 1 elements:
	 * (email) => email user account
	 *
	 */
	public function recoverAccount(){
		$this->layout = null;
		$request = $this->{'request'}->input('json_decode',true);
		$response  = array();

		$options = array(
			'conditions' => array(
				'User.email' 	=> $request['email'],
			)
		);

		$user = $this->{'User'}->find('first',$options);

		// checks that the user exist
		if($user){

			// checks that user is not banned
			if(!$user['User']['banned']){
				// checks that the user is not suspended
				if(!$user['User']['suspended']){
					Security::setHash('blowfish');

					$publicKey	 = CakeText::uuid();
					$privateKey  = Security::hash($publicKey);

					$data =	array(
						'User'=>Array
						(
							'id'				=>$user['User']['id'],
							'email_verified' 	=> 1,
							'temp_password'		=>$privateKey,
						)
					);

					if($this->{'User'}->save($data)){

						if($this->inProduction){
							$userData = $this->{'User'}->read();

							if ($this->sendEmailToRecoverUserAccount($userData['User']['email'], $userData['User']['id'], $publicKey)) {
								$response['status'] = 'success';
							}else{
								$response['status'] = 'error';
								$response['message'] = 'email-not-send';
							}
						}else{
							$response['status'] = 'success';
						}

					}else{
						$response['status']       = 'error';
						$response['message'] 		= $this->responseMessages('cannotSetNewParameters','es_VE');
						$response['messageType'] 	= 'cannotSetNewParameters';
					}
				}else{
					$response['status']       = 'error';
					$response['message'] 		= $this->responseMessages('suspended','es_VE');
					$response['messageType'] 	= 'suspended';
				}
			}else{
				$response['status']       = 'error';
				$response['message'] 		= $this->responseMessages('banned','es_VE');
				$response['messageType'] 	= 'banned';
			}
		}else{
			$response['status']       = 'error';
			$response['message'] 		= $this->responseMessages('userNotExist','es_VE');
			$response['messageType'] 	= 'userNotExist';
		}

		$this->{'set'}('response',$response);
		$this->render('/Elements/ajax_view');
	}


}
