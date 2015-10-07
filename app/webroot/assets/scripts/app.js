'use strict';

angular.module('forms',['ngMessages','ui.bootstrap','filters','angular-loading-bar','validation.match','jlareau.pnotify','cgBusy','validators','trTrustpass','ngPasswordStrength'])
    .controller('SolvencyController',['$scope','$q','$window','$http','notificationService','$log',function($scope,$q,$window,$http,notificationService,$log) {

		$scope.preview = true;

		$scope.previewSolvency = function(bolean){
			$scope.preview = bolean;
		};

		$scope.forms = {
			solvencyRequest: {},
			solvencyStatus:{}
		};

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
			},
			status:{
				'identityCard':null
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
	.controller('UsersController',['$scope','notificationService','$http','$filter','$log',function($scope,notificationService,$http,$filter,$log){

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

				//$log.info('ok fromJson', angular.fromJson($scope.model.register));
				//$log.info('ok toJson', angular.toJson($scope.model.register));

				$scope.httpRequestPromise =  $http.post('/new-user', $scope.model.register).
					then(function(response) {

						$log.info('new-user: ',response);

					}, function(error) {

						$log.info('error: ',error);

					});


			}else{
				notificationService.error('Algo falta');
			}
		};

		$scope.signIn = function(){
			$scope.forms.signIn.$setSubmitted(true);
			if($scope.forms.signIn.$valid){

				$log.info('ok fromJson', angular.fromJson($scope.model.signIn));
				$log.info('ok toJson', angular.toJson($scope.model.signIn));

				//in


			}else{
				notificationService.error('Algo falta');
			}
		};

		$scope.recover = function(){
			$scope.forms.recoverAccount.$setSubmitted(true);
			if($scope.forms.recoverAccount.$valid){

				$log.info('ok fromJson', angular.fromJson($scope.model.recoverAccount));
				$log.info('ok toJson', angular.toJson($scope.model.recoverAccount));

				//recover-account



			}else{
				notificationService.error('Algo falta');
			}
		};

	}]);

angular.module('app',['forms']);
