<?php
//$data = $this->{'request'}->data;

//$urlAction = strstr($this->{'request'}->url, '/', true); // Desde PHP 5.3.0
//if($urlAction === false){
//	$urlAction = $this->{'request'}->url;
//}
//$this->{'set'}('urlAction',$urlAction);

$scripts = array();
$css = array();

//  Redactor - http://imperavi.com/redactor/
//  array_push($scripts,'/assets/redactor/redactor.min.js');
//  array_push($scripts,'/assets/redactor/langs/es.js');
//  array_push($css,'/assets/redactor/redactor.css');

//array_push($scripts,'/bower_components/jquery/dist/jquery.js');
//array_push($scripts,'/bower_components/bootstrap/dist/js/bootstrap.js');
//array_push($scripts,'/bower_components/pnotify/pnotify.core.js');
//array_push($scripts,'/bower_components/angular/angular.js');
//array_push($scripts,'/bower_components/angular-busy/dist/angular-busy.js');
//array_push($scripts,'/bower_components/angular-pnotify/src/angular-pnotify.js');
//array_push($scripts,'/bower_components/angular-validation-match/dist/angular-input-match.js');
//array_push($scripts,'/bower_components/angular-bootstrap/ui-bootstrap.js');
//array_push($scripts,'/bower_components/angular-bootstrap/ui-bootstrap-tpls.js');
//array_push($scripts,'/bower_components/angular-messages/angular-messages.js');
//array_push($scripts,'/bower_components/uri.js/src/URI.js');
//array_push($scripts,'/assets/scripts/app.js');

//array_push($css,'/bower_components/bootstrap/dist/css/bootstrap.css');
//array_push($css,'/bower_components/font-awesome/css/font-awesome.min.css');
//array_push($css,'/bower_components/pnotify/pnotify.core.css');
//array_push($css,'/bower_components/angular-busy/dist/angular-busy.css');
//array_push($css,'/assets/styles/main.css');

//if($urlAction == 'login'){
//	array_push($css,'/assets/styles/login.css');
//}


?>
<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta data-http-equiv="cache-control" content="no-cache" />
	<meta data-http-equiv="expires" content="0" />
	<meta data-http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta data-http-equiv="pragma" content="no-cache" />

	<title>Solvencia de Biblioteca</title>

<!--	<script src="https://www.google.com/recaptcha/api.js?onload=vcRecaptchaApiLoaded&render=explicit" async defer></script>-->

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<!-- build:css(.) styles/vendor.css -->
	<!-- bower:css -->
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css" />
	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="bower_components/angular-loading-bar/src/loading-bar.css">
	<link rel="stylesheet" href="bower_components/pnotify/pnotify.core.css">
	<link rel="stylesheet" href="bower_components/pnotify/pnotify.buttons.css">
	<link rel="stylesheet" href="bower_components/angular-busy/dist/angular-busy.min.css">
	<link rel="stylesheet" href="bower_components/angular-trustpass/dist/tr-trustpass.min.css">
	<!-- endbower -->
	<!-- endbuild -->
	<!-- build:css(.tmp) styles/main.css -->
	<link rel="stylesheet" href="assets/styles/main.css">
	<!-- endbuild -->

	<link rel="shortcut icon" data-href="/favicon.png" type="image/x-icon">
	<link rel="icon" data-href="/favicon.png" type="image/x-icon">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body ng-app="app" data-ng-strict-di>

<div ng-include="'assets/partials/index/browseHappy.html'"></div>

<div ng-include="'assets/partials/index/nav.html'"></div>

<div class="container content">
	<?php echo $this->fetch('content'); ?>
</div>

<div ng-include="'assets/partials/index/footer.html'"></div>

<div ng-include="'assets/partials/index/googleAnalytics.html'"></div>

<!-- build:js(.) scripts/vendor.js -->
<!-- bower:js -->
<script src="/bower_components/jquery/dist/jquery.js"></script>
<script src="/bower_components/angular/angular.js"></script>
<script src="/bower_components/angular-animate/angular-animate.js"></script>
<script src="/bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
<script src="/bower_components/angular-busy/dist/angular-busy.js"></script>
<script src="/bower_components/angular-loading-bar/build/loading-bar.js"></script>
<script src="/bower_components/angular-messages/angular-messages.js"></script>
<script src="/bower_components/pnotify/pnotify.core.js"></script>
<script src="/bower_components/pnotify/pnotify.buttons.js"></script>
<script src="/bower_components/pnotify/pnotify.callbacks.js"></script>
<script src="/bower_components/pnotify/pnotify.confirm.js"></script>
<script src="/bower_components/pnotify/pnotify.desktop.js"></script>
<script src="/bower_components/pnotify/pnotify.history.js"></script>
<script src="/bower_components/pnotify/pnotify.nonblock.js"></script>
<script src="/bower_components/angular-pnotify/src/angular-pnotify.js"></script>
<script src="/bower_components/angular-uuid-service/angular-uuid-service.js"></script>
<script src="/bower_components/angular-validation-match/dist/angular-validation-match.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="/bower_components/angular-trustpass/dist/tr-trustpass.min.js"></script>
<!-- endbower -->
<!-- endbuild -->

<!-- build:js({.tmp,app}) scripts/scripts.js -->
<script src="assets/scripts/validators.js"></script>
<script src="assets/scripts/filters.js"></script>
<script src="assets/scripts/app.js"></script>
<!-- endbuild -->

</body>
</html>
