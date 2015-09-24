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

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<!-- build:css(.) styles/vendor.css -->
	<!-- bower:css -->
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css" />
	<!-- endbower -->
	<!-- endbuild -->
	<!-- build:css(.tmp) styles/main.css -->
	<link rel="stylesheet" href="assets/styles/main.css">
	<!-- endbuild -->

	<link rel="shortcut icon" data-href="/favicon.ico" type="image/x-icon">
	<link rel="icon" data-href="/favicon.ico" type="image/x-icon">
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

<div id="content" class="container-fluid content">
	<?php echo $this->fetch('content'); ?>
</div>

<div ng-include="'assets/partials/index/footer.html'"></div>

<div ng-include="'assets/partials/index/googleAnalytics.html'"></div>

<!-- build:js(.) scripts/vendor.js -->
<!-- bower:js -->
<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/angular/angular.js"></script>
<script src="bower_components/angular-messages/angular-messages.js"></script>
<script src="bower_components/angular-ui-router/release/angular-ui-router.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
<!-- endbower -->
<!-- endbuild -->

<!-- build:js({.tmp,app}) scripts/scripts.js -->
<script src="assets/scripts/app.js"></script>
<!-- endbuild -->

</body>
</html>