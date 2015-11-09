'use strict';

angular.module('forms',['ngMessages','ui.bootstrap','filters','angular-loading-bar','validation.match','jlareau.pnotify','cgBusy','validators','trTrustpass','ngPasswordStrength'])
    .controller('SolvencyController',['$scope','$q','$window','$http','notificationService','$log',function($scope,$q,$window,$http,notificationService,$log) {

		$scope.preview = true;

		$scope.previewSolvency = function(bolean){
			$scope.preview = bolean;
		};

		$scope.forms = {
			solvencyRequest: {}
		};

		//$scope.offices2 =[
		//	{
		//		officeName:'Instituto pedagógico de Caracas',
		//		libraryName:'Felipe Guevara Rojas',
		//		state:'Caracas EDO. Distrito Capital.',
		//		logo:'/assets/images/ipc.png',
		//		studies:{
        //
		//		}
		//	},
		//	{
		//		officeName:'Instituto pedagógico de Barquisimeto Luis Beltrán Prieto Figueroa',
		//		libraryName:'',
		//		state:'',
		//		logo:'',
		//		careers:{}
		//	},
		//	{
		//		officeName:'Instituto pedagógico de Gervasio Rubio',
		//		libraryName:'',
		//		state:'',
		//		logo:'',
		//		careers:{}
		//	},
		//	{
		//		officeName:'Instituto pedagógico de Maturín',
		//		libraryName:'ANDRÉS ELOY BLANCO',
		//		state:'Maturín EDO. Monagas.',
		//		logo:'/assets/images/ipm.png',
		//		studies:[
		//			{
		//				'studyType':'Pregrado',
		//				'prefix':'la especialidad de',
		//				'specialties':[
		//					'Biología',
		//					'Física',
		//					'Química',
		//					'Matemática',
		//					'Ciencias de la Tierra',
		//					'Geografía e Historia',
		//					'Educación Física',
		//					'Educación Integral',
		//					'Educación Comercial',
		//					'Educación Especial',
		//					'Educación Preescolar',
		//					'Informática',
		//					'Ingles',
		//					'Lengua y Literatura'
		//				]
		//			},
		//			{
		//				'studyType':'Maestría',
		//				'prefix':'la',
		//				'specialties':[
		//					'MAESTRÍA EN EDUCACIÓN MENCIÓN EDUCACIÓN SUPERIOR',
		//					'MAESTRÍA EN EDUCACIÓN MENCIÓN GERENCIA EDUCACIONAL',
		//					'MAESTRÍA EN EDUCACIÓN MENCIÓN ENSEÑANZA DE LA MATEMÁTICA',
		//					'MAESTRÍA EN EDUCACIÓN MENCIÓN ENSEÑANZA DE LA GEOHISTORIA',
		//					'MAESTRÍA EN EDUCACIÓN MENCIÓN ENSEÑANZA DE LA EDUCACIÓN FÍSICA',
		//					'MAESTRÍA EN LINGÜÍSTICA',
		//					'MAESTRÍA EN LITERATURA LATINOAMERICANA',
		//					'MAESTRÍA EN ENSEÑANZA DEL INGLÉS COMO LENGUA EXTRANJERA',
		//					'MAESTRÍA EN EDUCACIÓN AMBIENTAL'
		//				]
		//			},
		//			{
		//				'studyType':'Especializaciones',
		//				'prefix':'la',
		//				'specialties':[
		//					'ESPECIALIZACIÓN EN EDUCACIÓN BÁSICA',
		//					'ESPECIALIZACIÓN EN PROCESOS DIDÁCTICOS PARA EL NIVEL EDUCATIVO BÁSICO',
		//					'ESPECIALIZACIÓN EN DOCENCIA UNIVERSITARIA',
		//					'ESPECIALIZACIÓN EN EDUCACIÓN PARA LA GESTIÓN COMUNITARIA',
		//					'ESPECIALIZACIÓN EN EDUCACIÓN PARA LA INTEGRACIÓN DE PERSONAS CON DISCAPACIDADES',
		//					'ESPECIALIZACIÓN EN EDUCACIÓN INICIAL'
		//				]
		//			},
		//			{
		//				'studyType':'Doctorado',
		//				'prefix':'el',
		//				'specialties':[
		//					'DOCTORADO EN EDUCACIÓN'
		//				]
		//			}
		//		]
		//	},
		//	{
		//		officeName:'Instituto pedagógico de Maracay Rafael Alberto Escobar Lara',
		//		libraryName:'',
		//		state:'',
		//		logo:'',
		//		studies:{}
		//	},
		//	{
		//		officeName:'Instituto pedagogico Jose Manuel Siso Martínez',
		//		libraryName:'',
		//		state:'',
		//		logo:'',
		//		studies:{}
		//	},
		//	{
		//		officeName:'Instituto de Mejoramiento Profesional Del Magisterio',
		//		libraryName:'',
		//		state:'',
		//		logo:'',
		//		studies:{}
		//	},
		//	{
		//		officeName:'Instituto Pedagógico Rural “El Macaro”',
		//		libraryName:'',
		//		state:'',
		//		logo:'',
		//		studies:{}
		//	}
		//];

		$scope.offices =[
			{
				shortName:'Caracas',
				library:'Felipe Guevara Rojas',
				state:'Caracas EDO. Distrito Capital.',
				logo:'/assets/images/ipc.png'
			},
			{
				shortName:'Maturín',
				library:'ANDRÉS ELOY BLANCO',
				state:'Maturín EDO. Monagas.',
				logo:'/assets/images/ipm.png'
			}
		];

        $scope.studies = [
            {
                'study':'Pregrado',
                'prefix':'la especialidad de',
                'specialties':[
                    'Biología',
                    'Física',
                    'Química',
                    'Matemática',
                    'Ciencias de la Tierra',
                    'Geografía e Historia',
                    'Educación Física',
                    'Educación Integral',
                    'Educación Comercial',
                    'Educación Especial',
                    'Educación Preescolar',
                    'Informática',
                    'Ingles',
                    'Lengua y Literatura'
                ]
            },
            {
                'study':'Maestría',
                'prefix':'la',
                'specialties':[
                    'MAESTRÍA EN EDUCACIÓN MENCIÓN EDUCACIÓN SUPERIOR',
                    'MAESTRÍA EN EDUCACIÓN MENCIÓN GERENCIA EDUCACIONAL',
                    'MAESTRÍA EN EDUCACIÓN MENCIÓN ENSEÑANZA DE LA MATEMÁTICA',
                    'MAESTRÍA EN EDUCACIÓN MENCIÓN ENSEÑANZA DE LA GEOHISTORIA',
                    'MAESTRÍA EN EDUCACIÓN MENCIÓN ENSEÑANZA DE LA EDUCACIÓN FÍSICA',
                    'MAESTRÍA EN LINGÜÍSTICA',
                    'MAESTRÍA EN LITERATURA LATINOAMERICANA',
                    'MAESTRÍA EN ENSEÑANZA DEL INGLÉS COMO LENGUA EXTRANJERA',
                    'MAESTRÍA EN EDUCACIÓN AMBIENTAL'
                ]
            },
            {
                'study':'Especializaciones',
                'prefix':'la',
                'specialties':[
                    'ESPECIALIZACIÓN EN EDUCACIÓN BÁSICA',
                    'ESPECIALIZACIÓN EN PROCESOS DIDÁCTICOS PARA EL NIVEL EDUCATIVO BÁSICO',
                    'ESPECIALIZACIÓN EN DOCENCIA UNIVERSITARIA',
                    'ESPECIALIZACIÓN EN EDUCACIÓN PARA LA GESTIÓN COMUNITARIA',
                    'ESPECIALIZACIÓN EN EDUCACIÓN PARA LA INTEGRACIÓN DE PERSONAS CON DISCAPACIDADES',
                    'ESPECIALIZACIÓN EN EDUCACIÓN INICIAL'
                ]
            },
            {
                'study':'Doctorado',
                'prefix':'el',
                'specialties':[
                    'DOCTORADO EN EDUCACIÓN'
                ]
            }
        ];

		var original = angular.copy($scope.model = {
			solvency:{
				office: $scope.offices[0],
				study: $scope.studies[0],
				specialty:null,
				name: '',
				lastName: '',
				identityCard:null,
				registration:'',
				date:new Date(),
				email:''
			}
		});

		$scope.setToFix = function(){
			//$scope.model = original;
			$log.log(original);

		};

        $scope.resetSolvencyRequestForm = function(){
			angular.copy(original.solvency,$scope.model.solvency);
			$scope.model.solvency.office = $scope.offices[0]; // some bug here, can't reset select to default value with angular.copy
			$scope.model.solvency.study = $scope.studies[0]; // some bug here, can't reset select to default value with angular.copy

			$scope.forms.solvencyRequest.$setUntouched();
            $scope.forms.solvencyRequest.$setPristine();
        };

		$scope.resetStatusRequestForm = function(){
			angular.copy(original.status,$scope.model.status);
			$scope.forms.solvencyRequest.$setUntouched();
			$scope.forms.solvencyStatus.$setPristine();
		};

		$scope.print = function(){
			$scope.forms.solvencyRequest.$setSubmitted(true);
            if($scope.forms.solvencyRequest.$valid){
                $window.print();
            }
        };

    }])
	.controller('UsersController',['$scope','$window','notificationService','$http','$filter','$log',function($scope,$window,notificationService,$http,$filter,$log){

		var original = angular.copy($scope.model = {
			signIn:{
				'email':'',
				'password':''
			},
			register:{
				'names': '',
				'lastNames':'',
				'email':'',
				'password':'',
				'samePassword':''
			},
			recoverAccount:{
				'email':''
			}
		});

		$scope.forms = {
			signIn: {},
			register:{},
			recoverAccount:{}
		};

		$scope.resetRegisterForm = function(){
			angular.copy(original.register,$scope.model.register);
			$scope.forms.register.$setUntouched();
			$scope.forms.register.$setPristine();
		};

		$scope.resetSignInForm = function(){
			angular.copy(original.signIn,$scope.model.signIn);
			$scope.forms.signIn.$setUntouched();
			$scope.forms.signIn.$setPristine();
		};

		var resetRecoverAccountForm = function () {
			angular.copy(original.recoverAccount,$scope.model.recoverAccount);
			$scope.forms.recoverAccount.$setUntouched();
			$scope.forms.recoverAccount.$setPristine();
		};

		$scope.register = function(){
			$scope.forms.register.$setSubmitted(true);
			if($scope.forms.register.$valid){

				$scope.httpRequestPromise =  $http.post('/new-user', $scope.model.register).
					then(function(response) {
						if(response.data.status === 'success'){
							notificationService.success('Listo, ahora solo falta validar su email, revise su correo.');
							$scope.resetRegisterForm();
						}else{
							notificationService.error(response.data.message);
						}
					}, function(error) {
						$log.error('Error at app.js: $scope.register() ',error);
					});

			}else{
				notificationService.error('¡Algo falta!');
			}
		};

		$scope.signIn = function(){
			$scope.forms.signIn.$setSubmitted(true);
			if($scope.forms.signIn.$valid){

				$scope.httpRequestPromise =  $http.post('/in', $scope.model.signIn).
					then(function(response) {
						if(response.data.status === 'success'){
							$scope.resetSignInForm();
							$window.location = '/';
						}else{
							notificationService.error(response.data.message);
						}
					}, function(error) {
						$log.error('Error at app.js: $scope.signIn() ',error);
					});

			}else{
				notificationService.error('¡Algo falta!');
			}
		};

		$scope.recover = function(){
			$scope.forms.recoverAccount.$setSubmitted(true);
			if($scope.forms.recoverAccount.$valid){

				$scope.httpRequestPromise =  $http.post('/recover-account', $scope.model.recoverAccount).
					then(function(response) {
						if(response.data.status === 'success'){
							notificationService.success('Listo, ahora revise su correo.');
							resetRecoverAccountForm();
						}else{
							$log.info('response.data: ',response.data);
							notificationService.error(response.data.message);
						}
					}, function(error) {
						$log.error('Error at app.js: $scope.signIn() ',error);
					});

			}else{
				notificationService.error('Algo falta');
			}
		};

	}]);

angular.module('app',['forms']);
