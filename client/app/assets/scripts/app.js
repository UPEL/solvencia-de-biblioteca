'use strict';

angular.module('routes',['ui.router'])
    .config(['$urlRouterProvider','$stateProvider',function($urlRouterProvider,$stateProvider){

        $urlRouterProvider.otherwise('/');

        $stateProvider
            .state('home',{
                url:'/',
                templateUrl:'assets/partials/contents/solvency.html'
            });

    }]);


angular.module('forms',['ngMessages'])
    .controller('SolvencyController',['$scope',function($scope) {

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

        var original = angular.copy($scope.user = {
            study: $scope.studies[0],
            specialty:null,
            name: '',
            lastName: '',
            identityCard:null,
            registration:'',
            date:new Date()
        });

        $scope.reset = function(){
            $scope.user = angular.copy(original);
            $scope.userForm.$setUntouched();
            $scope.userForm.$setPristine();
        };

        $scope.print = function(){
            if($scope.userForm.$valid){
                window.print();
            }
        };

    }])
    .filter('capitalize', function() {
        return function(input) {
            return (!!input) ? input.replace(/([^\W_]+[^\s-]*) */g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}) : '';
        };
    });

angular.module('app',['routes','forms']);