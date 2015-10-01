'use strict';

angular.module('forms',['ngMessages','ui.bootstrap'])
    .controller('SolvencyController',['$scope','$log',function($scope,$log) {

		$scope.previewSolvency = true;

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
                window.print();
            }
        };

    }])
    .filter('capitalize', function() {
        return function(input) {
            return (!!input) ? input.replace(/([^\W_]+[^\s-]*) */g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}) : '';
        };
    });

angular.module('app',['forms']);
