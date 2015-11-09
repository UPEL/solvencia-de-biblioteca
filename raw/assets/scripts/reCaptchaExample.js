'use strict';

angular.module('questionsAndAnswers',['ngMessages','vcRecaptcha','jlareau.pnotify','cgBusy'])
	.controller('QuestionsController',['$scope','$q','$http','vcRecaptchaService','notificationService','$log',function ($scope,$q,$http,recaptchaService,notificationService,$log) {

		$scope.model = {
			reCaptcha:{
				publicKey:'6Ld3Lg0TAAAAAGMtCGZf939Fphu5zyqrAX8JY5KI',
				response:null,
				widgetId:null
			},
			question:''
		};

		/**
		 * reCaptcha response
		 * */
		$scope.setResponse = function (response) {
			$scope.model.reCaptcha.response = response;
		};

		/**
		 * reCaptcha WidgetId
		 * */
		$scope.setWidgetId = function (widgetId) {
			$scope.model.reCaptcha.widgetId = widgetId;
		};

		/**
		 * reCaptcha Expired
		 * */
		$scope.reCaptchaExpired = function() {
			recaptchaService.reload($scope.widgetId);
			$scope.model.reCaptcha.response = null;
		};

		/**
		 * reCaptcha reset function
		 * */
		$scope.resetReCaptcha = function () {
			$scope.model.reCaptcha.response = null;
			$scope.model.question = null;
			$scope.questionsForm.$setUntouched();
			$scope.questionsForm.$setPristine();
			recaptchaService.reload($scope.widgetId);
		};

		$scope.submit = function () {
			if($scope.questionsForm.$valid && ($scope.model.reCaptcha.response !== null)){
				$scope.httpRequestPromise =  $http.post('/add-question', $scope.model).
					then(function(response) {
						if(response['data']['httpResponseIsOk'] && response['data']['reCaptcha'] === 'valid' && response['data']['saveStatus'] === 'success'){
							$scope.resetReCaptcha();
							notificationService.notice('Tu pregunta ha sido recibida y será contestada en la brevedad posible.');
						}else{
							location.reload();
						}
					}, function(error) {
						location.reload();
					});
			}else{
				notificationService.notice('Algo falta');
			}
		}


	}])
	.directive('input', function ($parse) {
		return {
			restrict: 'E',
			require: '?ngModel',
			link: function (scope, element, attrs) {
				if (attrs.ngModel && attrs.value) {
					$parse(attrs.ngModel).assign(scope, attrs.value);
				}
			}
		};
	})
	.directive('noSpecialChars', function() {
		return {
			restrict:'A',
			require : 'ngModel',
			link : function(scope, element, attrs, ngModel) {
				ngModel.$validators.noSpecialChars = function(input) {
					// a false return value indicates an error
					return (String(input).match(/[^a-zá-źA-ZÁ-Ź0-9\s]/g)) ? false : true;
				};
			}
		};
	});
