<section ng-controller="UsersController">

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
										- El <b>email</b> es requerido.
									</div>
									<div data-ng-message="email">
										- El <b>email</b> debe ser válido
									</div>
								</div>
							</div>

							<div class="form-group" ng-class="{'has-success has-feedback': (forms.signIn.$submitted && forms.signIn.password.$valid),'has-error has-feedback': (forms.signIn.$submitted && forms.signIn.password.$invalid) }">
								<label class="control-label"><i class="fa fa-key"></i> Contraseña <sup style="color: red;">*</sup></label>
								<input type="password" name="password" ng-model="model.signIn.password" required minlength="7" class="form-control" placeholder="">
								<span ng-show="forms.signIn.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.signIn.password.$valid),'glyphicon-remove': ( forms.signIn.password.$invalid) }" aria-hidden="true"></span>
								<div data-ng-messages="forms.signIn.$submitted && forms.signIn.password.$error" class="help-block">
									<div data-ng-message="required">
										- La <b>contraseña</b> es requerida.
									</div>
									<div data-ng-message="minlength" >
										- La <b>contraseña</b> debe tener al menos 7 caracteres de largo.
									</div>
								</div>
							</div>

							<div style="margin-bottom: 10px;">
								<input type="checkbox" ng-model="model.signIn.rememberMe"> Recuérdame
							</div>

							<button  class="btn btn-warning" type="button" ng-click="resetSignInForm()"> Reiniciar el formulario </button>
							<button  class="btn btn-primary" type="submit" ng-click="signIn()"> Entrar </button>

						</div>

						<hr>

						<div class="alert alert-info alert-xs" style="margin-bottom: 0;" role="alert">NOTA: Este superíndice <sup style="color: red;">*</sup> significa que el campo requiere ser completado.</div>

					</div>

				</tab>
				<tab heading="Registrarse">

					<div style="margin-top: 10px;">

						<div ng-form="forms.register">

							<div class="form-group" ng-class="{'has-success has-feedback': (forms.register.$submitted && forms.register.names.$valid),'has-error has-feedback': (forms.register.$submitted && forms.register.names.$invalid) }">
								<label class="control-label"> Nombres <sup style="color: red;">*</sup></label>
								<input type="text" name="names" ng-model="model.register.names" ng-trim no-special-chars required capitalize class="form-control" placeholder="">
								<span ng-show="forms.register.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.register.names.$valid),'glyphicon-remove': ( forms.register.names.$invalid) }" aria-hidden="true"></span>
								<div data-ng-messages="forms.register.$submitted && forms.register.names.$error" class="help-block">
									<div data-ng-message="required">
										- El <b>nombre</b> es requerido.
									</div>
									<div data-ng-message="noSpecialChars">
										- No esta permitido el uso de caracteres especiales.
									</div>
								</div>
							</div>

							<div class="form-group" ng-class="{'has-success has-feedback': (forms.register.$submitted && forms.register.lastNames.$valid),'has-error has-feedback': (forms.register.$submitted && forms.register.lastNames.$invalid) }">
								<label class="control-label"> Apellidos <sup style="color: red;">*</sup></label>
								<input type="text" name="lastNames" ng-model="model.register.lastNames" ng-trim no-special-chars required capitalize class="form-control" placeholder="">
								<span ng-show="forms.register.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.register.lastNames.$valid),'glyphicon-remove': ( forms.register.lastNames.$invalid) }" aria-hidden="true"></span>
								<div data-ng-messages="forms.register.$submitted && forms.register.lastNames.$error" class="help-block">
									<div data-ng-message="required">
										- El <b>apellido</b> es requerido.
									</div>
									<div data-ng-message="noSpecialChars">
										- No esta permitido el uso de caracteres especiales.
									</div>
								</div>
							</div>

							<div class="form-group" ng-class="{'has-success has-feedback': (forms.register.$submitted && forms.register.email.$valid),'has-error has-feedback': (forms.register.$submitted && forms.register.email.$invalid) }">
								<label class="control-label"><i class="fa fa-envelope"></i> Email <sup style="color: red;">*</sup></label>
								<input type="email" name="email" ng-model="model.register.email" required class="form-control" placeholder="">
								<span ng-show="forms.register.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.register.email.$valid),'glyphicon-remove': ( forms.register.email.$invalid) }" aria-hidden="true"></span>
								<div data-ng-messages="forms.register.$submitted && forms.register.email.$error" class="help-block">
									<div data-ng-message="required">
										- El <b>email</b> es requerido.
									</div>
									<div data-ng-message="email">
										- El <b>email</b> debe ser válido
									</div>
								</div>
							</div>

							<div class="form-group" ng-class="{'has-success has-feedback': (forms.register.$submitted && forms.register.password.$valid),'has-error has-feedback': (forms.register.$submitted && forms.register.password.$invalid) }">
								<label class="control-label"><i class="fa fa-key"></i> Contraseña <sup style="color: red;">*</sup></label>
								<input
									class="form-control"
									type="password"
									name="password"
									ng-model="model.register.password"
									required
									minlength="7"
									maxlength="50"
									placeholder=""
									tr-trustpass="{
										maximum: true,
										messageGuide: 'Asegúrese de que su contraseña cumpla estos requisitos:',
									 	messageDone:'¡Excelente! Su contraseña es aceptable.',
									 	lowercaseLabel:'Un carácter en minúscula.',
									 	uppercaseLabel:'Un carácter en mayúscula.',
									 	numberLabel:'Un número.',
									 	specialLabel:'Un carácter especial.',
									 	minimumLabel:'Caracteres mínimo.',
									 	maximumLabel:'Caracteres máximo.',
									 	wordLabel:'Caracteres alfanuméricos.'
									}"
									>
								<span ng-show="forms.register.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.register.password.$valid),'glyphicon-remove': ( forms.register.password.$invalid) }" aria-hidden="true"></span>
								<div data-ng-messages="forms.register.$submitted && forms.register.password.$error" class="help-block">
									<div data-ng-message="required">
										- La <b>contraseña</b> es requerida.
									</div>
									<div data-ng-message="minlength" >
										- La <b>contraseña</b> debe tener al menos 7 caracteres de largo.
									</div>
									<div data-ng-message="trustpass" >
										- Asegúrese de cumplir con los requisitos mínimos anteriormente descritos.
									</div>
								</div>

								<div>Fortaleza de la contraseña: {{passStrength}}%</div>
								<div ng-password-strength="model.register.password" strength="passStrength" inner-class="progress-bar" inner-class-prefix="progress-bar-"></div>

							</div>

<!--							<pre>{{forms.register.password | json}}</pre>-->


							<div class="form-group" ng-class="{'has-success has-feedback': (forms.register.$submitted && forms.register.samePassword.$valid),'has-error has-feedback': (forms.register.$submitted && forms.register.samePassword.$invalid) }">
								<label class="control-label"><i class="fa fa-key"></i> Confirme la contraseña <sup style="color: red;">*</sup></label>
								<input type="password" name="samePassword" ng-model="model.register.samePassword" required match="model.register.password" minlength="7" class="form-control" placeholder="">
								<span ng-show="forms.register.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.register.password.$valid),'glyphicon-remove': ( forms.register.password.$invalid) }" aria-hidden="true"></span>
								<div data-ng-messages="forms.register.$submitted && forms.register.samePassword.$error" class="help-block">
									<div data-ng-message="required">
										- La <b>misma contraseña</b> es requerida.
									</div>
									<div data-ng-message="match">
										- Las <b>contraseñas</b> no coinciden!.
									</div>
									<div data-ng-message="minlength" >
										- La <b>contraseña</b> debe tener al menos 7 caracteres de largo.
									</div>
								</div>								<div>Fortaleza de la contraseña: {{passStrength}}</div>

							</div>


							<button  class="btn btn-warning" type="button" ng-click="resetRegisterForm()"> Reiniciar el formulario </button>
							<button  class="btn btn-primary" type="submit" ng-click="register()"> Registrarse </button>


						</div>

						<hr>

						<div class="alert alert-info alert-xs" style="margin-bottom: 0;" role="alert">NOTA: Este superíndice <sup style="color: red;">*</sup> significa que el campo requiere ser completado.</div>

<!--						<hr>-->
<!--						<pre>{{forms.register | json}}</pre>-->
<!--						<pre>{{model.register | json}}</pre>-->

					</div>

				</tab>
				<tab heading="Recuperar cuenta">

					<div style="margin-top: 10px;">

						<div ng-form="forms.recoverAccount" style="margin-top: 10px;">
							<div class="form-group" ng-class="{'has-success has-feedback': (forms.recoverAccount.$submitted && forms.recoverAccount.email.$valid),'has-error has-feedback': (forms.recoverAccount.$submitted && forms.recoverAccount.email.$invalid) }">
								<label class="control-label"><i class="fa fa-envelope"></i> Email <sup style="color: red;">*</sup></label>
								<input type="email" name="email" ng-model="model.recoverAccount.email" required class="form-control" placeholder="">
								<span ng-show="forms.recoverAccount.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.recoverAccount.email.$valid),'glyphicon-remove': ( forms.recoverAccount.email.$invalid) }" aria-hidden="true"></span>
								<div data-ng-messages="forms.recoverAccount.$submitted && forms.recoverAccount.email.$error" class="help-block">
									<div data-ng-message="required">
										- El <b>email</b> es requerido.
									</div>
									<div data-ng-message="email">
										- El <b>email</b> debe< ser válido
									</div>
								</div>
							</div>
							<button  class="btn btn-primary" type="submit" ng-click="recover()"> Recuperar </button>
						</div>

						<hr>

						<div class="alert alert-info alert-xs" style="margin-bottom: 0;" role="alert">NOTA: Este superíndice <sup style="color: red;">*</sup> significa que el campo requiere ser completado.</div>

					</div>

				</tab>
			</tabset>

		</div>
	</div>

</section>



