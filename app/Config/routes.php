<?php

/* Sort alphabetically by the name of the controller. */

//	A
//	B
//	C
//	D
//	E
//	F

/**
 * @Description Acción Get - Interfaz principal.
 */
Router::connect('/',		array('controller' => 'frontEnds', 		'action' => 'index'));

// U

/**
 * @Description Acción Get - Interfaz del administrador.
 */
Router::connect('/login',	array('controller' => 'users', 			'action' => 'login'));

/**
 * @Description Acción Get - Para salir de la aplicación
 */
Router::connect('/logout',									array('controller' => 'users', 	'action' => 'logout'));

/**
 * @Description Acción Get - Interfaz de entrada a la aplicación o registro de un nuevo usuario.
 */
Router::connect('/login',									array('controller' => 'users', 	'action' => 'login'));

/**
 * @Description Acción Ajax - Para entrar a la aplicación.
 */
Router::connect('/in',										array('controller' => 'users', 	'action' => 'in'));

/**
 * @Description Acción Ajax - Para registrar un nuevo usuario.
 */
Router::connect('/new-user',								array('controller' => 'users', 	'action' => 'add'));

/**
 * @Description Acción Ajax - Para determinar si el correo ya se ha registrado.
 */
Router::connect('/check-email',								array('controller' => 'users', 	'action' => 'check_email'));

/**
 * @Description Acción Ajax - Para recuperar una cuenta.
 */
Router::connect('/recover-account',							array('controller' => 'users', 	'action' => 'recover_account'));

/**
 * @Description Acción Get 	- Verify email address, This url is sent as a link to the user's email
 */
Router::connect('/ve/:id/:key', 							array('controller' => 'users', 	'action' => 'verify_email_address'),
	array(
		'pass' => array('id','key')
	));

/**
 * @Description Acción Ajax - send email again to verify email address
 */
Router::connect('/sea', 									array('controller' => 'users', 	'action' => 'send_email_again_to_verify_email_address'));

/**
 * @Description Acción Get 	- to obtain access to the form to change password, This url is sent as a link to the user's email
 */
Router::connect('/npr/:id/:key', 							array('controller' => 'users', 	'action' => 'new_password_request'),
	array(
		'pass' => array('id','key')
	));

/**
 * @Description Acción Ajax - set new password
 */
Router::connect('/snp', 						array('controller' => 'users', 	'action' => 'set_new_password')); //
