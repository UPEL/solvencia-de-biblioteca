<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Página de acceso</h3>
	</div>
	<div class="panel-body">

		<tabset>
			<tab heading="Estoy retornado">

				<div style="margin-top: 10px;">

					<div ng-form="forms.signIn" style="margin-top: 10px;">

						<div class="form-group" ng-class="{'has-success has-feedback': (forms.signIn.$submitted && forms.signIn.email.$valid),'has-error has-feedback': (forms.signIn.$submitted && forms.signIn.email.$invalid) }">
							<label class="control-label"><i class="fa fa-envelope"></i> Email <sup style="color: red;">*</sup></label>
							<input type="email" name="email" ng-model="model.signIn.email" required class="form-control" placeholder="">
							<span ng-show="forms.signIn.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.signIn.email.$valid),'glyphicon-remove': ( forms.signIn.email.$invalid) }" aria-hidden="true"></span>
							<div data-ng-messages="forms.signIn.$submitted && forms.signIn.email.$error" class="help-block">
								<div data-ng-message="required">
									- The <b>email</b> is required.
								</div>
								<div data-ng-message="email">
									- The <b>email</b> must be valid.
								</div>
							</div>
						</div>

						<div class="form-group" ng-class="{'has-success has-feedback': (forms.signIn.$submitted && forms.signIn.password.$valid),'has-error has-feedback': (forms.signIn.$submitted && forms.signIn.password.$invalid) }">
							<label class="control-label"><i class="fa fa-key"></i> Password <sup style="color: red;">*</sup></label>
							<input type="{{showPassword ? 'text' : 'password'}}" name="password" ng-model="model.signIn.password" required minlength="7" class="form-control" placeholder="">
							<span ng-show="forms.signIn.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.signIn.password.$valid),'glyphicon-remove': ( forms.signIn.password.$invalid) }" aria-hidden="true"></span>
							<div data-ng-messages="forms.signIn.$submitted && forms.signIn.password.$error" class="help-block">
								<div data-ng-message="required">
									- The <b>password</b> is required.
								</div>
								<div data-ng-message="minlength" >
									- The <b>password</b> must be at least 7 characters long.
								</div>
							</div>
						</div>

						<div style="margin-bottom: 10px;">
							<input type="checkbox" ng-model="model.signIn.rememberMe"> Remember me
						</div>

						<button  class="btn btn-warning" type="button" ng-click="resetSignInForm()"> Reset the form </button>
						<button  class="btn btn-primary" type="submit" ng-click="signIn()"> Sign in </button>

					</div>

					<hr>
					<div class="alert alert-info alert-xs" style="margin-bottom: 0;" role="alert">NOTA: Este superíndice <sup style="color: red;">*</sup> significa que el campo requiere ser completado.</div>

				</div>

			</tab>
			<tab heading="Registrarse">

				<div style="margin-top: 10px;">

					<div ng-form="forms.register">

						<div class="form-group" ng-class="{'has-success has-feedback': (forms.register.$submitted && forms.register.name.$valid),'has-error has-feedback': (forms.register.$submitted && forms.register.name.$invalid) }">
							<label class="control-label"> Name <sup style="color: red;">*</sup></label>
							<input type="text" name="name" ng-model="model.register.name" required class="form-control" placeholder="">
							<span ng-show="forms.register.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.register.name.$valid),'glyphicon-remove': ( forms.register.name.$invalid) }" aria-hidden="true"></span>
							<div data-ng-messages="forms.register.$submitted && forms.register.name.$error" class="help-block">
								<div data-ng-message="required">
									- The <b>name</b> is required.
								</div>
							</div>
						</div>

						<div class="form-group" ng-class="{'has-success has-feedback': (forms.register.$submitted && forms.register.lastName.$valid),'has-error has-feedback': (forms.register.$submitted && forms.register.lastName.$invalid) }">
							<label class="control-label"> Last Name <sup style="color: red;">*</sup></label>
							<input type="text" name="lastName" ng-model="model.register.lastName" required class="form-control" placeholder="">
							<span ng-show="forms.register.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.register.lastName.$valid),'glyphicon-remove': ( forms.register.lastName.$invalid) }" aria-hidden="true"></span>
							<div data-ng-messages="forms.register.$submitted && forms.register.lastName.$error" class="help-block">
								<div data-ng-message="required">
									- The <b>Last Name</b> is required.
								</div>
							</div>
						</div>

						<div class="form-group" ng-class="{'has-success has-feedback': (forms.register.$submitted && forms.register.email.$valid),'has-error has-feedback': (forms.register.$submitted && forms.register.email.$invalid) }">
							<label class="control-label"><i class="fa fa-envelope"></i> Email <sup style="color: red;">*</sup></label>
							<input type="email" name="email" ng-model="model.register.email" required class="form-control" placeholder="">
							<span ng-show="forms.register.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.register.email.$valid),'glyphicon-remove': ( forms.register.email.$invalid) }" aria-hidden="true"></span>
							<div data-ng-messages="forms.register.$submitted && forms.register.email.$error" class="help-block">
								<div data-ng-message="required">
									- The <b>email</b> is required.
								</div>
								<div data-ng-message="email">
									- The <b>email</b> must be valid.
								</div>
							</div>
						</div>

						<div class="form-group" ng-class="{'has-success has-feedback': (forms.register.$submitted && forms.register.password.$valid),'has-error has-feedback': (forms.register.$submitted && forms.register.password.$invalid) }">
							<label class="control-label"><i class="fa fa-key"></i> Password <sup style="color: red;">*</sup></label>
							<input type="password" name="password" ng-model="model.register.password" required minlength="7" class="form-control" placeholder="">
							<span ng-show="forms.register.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.register.password.$valid),'glyphicon-remove': ( forms.register.password.$invalid) }" aria-hidden="true"></span>
							<div data-ng-messages="forms.register.$submitted && forms.register.password.$error" class="help-block">
								<div data-ng-message="required">
									- The <b>password</b> is required.
								</div>
								<div data-ng-message="minlength" >
									- The <b>password</b> must be at least 7 characters long.
								</div>
							</div>
						</div>

						<div class="form-group" ng-class="{'has-success has-feedback': (forms.register.$submitted && forms.register.samePassword.$valid),'has-error has-feedback': (forms.register.$submitted && forms.register.samePassword.$invalid) }">
							<label class="control-label"><i class="fa fa-key"></i> Same Password <sup style="color: red;">*</sup></label>
							<input type="password" name="samePassword" ng-model="model.register.samePassword" required match="model.register.password" minlength="7" class="form-control" placeholder="">
							<span ng-show="forms.register.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.register.password.$valid),'glyphicon-remove': ( forms.register.password.$invalid) }" aria-hidden="true"></span>
							<div data-ng-messages="forms.register.$submitted && forms.register.samePassword.$error" class="help-block">
								<div data-ng-message="required">
									- The <b>same password</b> is required.
								</div>
								<div data-ng-message="match">
									- The <b>passwords</b> do not match!.
								</div>
								<div data-ng-message="minlength" >
									- The <b>password</b> must be at least 7 characters long.
								</div>
							</div>
						</div>


						<button  class="btn btn-warning" type="button" ng-click="resetRegisterForm()"> Reset the form </button>
						<button  class="btn btn-primary" type="submit" ng-click="register()"> Sign in </button>


					</div>

					<hr>
					<div class="alert alert-info alert-xs" style="margin-bottom: 10px; margin-top: 10px; " role="alert">NOTE: This superscript <sup style="color: red;">*</sup> mean that, is required.</div>

				</div>

			</tab>
			<tab heading="Recuperar cuenta">
				<div ng-form="forms.recoverAccount" style="margin-top: 10px;">
					<div class="form-group" ng-class="{'has-success has-feedback': (forms.recoverAccount.$submitted && forms.recoverAccount.email.$valid),'has-error has-feedback': (forms.recoverAccount.$submitted && forms.recoverAccount.email.$invalid) }">
						<label class="control-label"><i class="fa fa-envelope"></i> Email <sup style="color: red;">*</sup></label>
						<input type="email" name="email" ng-model="model.recoverAccount.email" required class="form-control" placeholder="">
						<span ng-show="forms.recoverAccount.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.recoverAccount.email.$valid),'glyphicon-remove': ( forms.recoverAccount.email.$invalid) }" aria-hidden="true"></span>
						<div data-ng-messages="forms.recoverAccount.$submitted && forms.recoverAccount.email.$error" class="help-block">
							<div data-ng-message="required">
								- The <b>email</b> is required.
							</div>
							<div data-ng-message="email">
								- The <b>email</b> must be valid.
							</div>
						</div>
					</div>
				</div>
				<button  class="btn btn-primary" type="submit" ng-click="recover()"> Recover </button>
				<hr>
				<div class="alert alert-info alert-xs" style="margin-bottom: 10px; margin-top: 10px; " role="alert">NOTE: This superscript <sup style="color: red;">*</sup> mean that, is required.</div>
			</tab>
		</tabset>







	</div>
</div>


