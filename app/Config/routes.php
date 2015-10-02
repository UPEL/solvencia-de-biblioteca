<?php

/* Sort alphabetically by the name of the controller. */

//	A
//	B
//	C
//	D
//	E
//	F
Router::connect('/',		array('controller' => 'frontEnds', 		'action' => 'index'));	// Acción Get - Interfaz principal.
Router::connect('/login',	array('controller' => 'users', 			'action' => 'index'));		// Acción Get - Interfaz del administrador.
