<section ng-controller="SolvencyController">

	<div class="panel panel-default non-printable">
		<div class="panel-heading">
			<h3 class="panel-title">Solvencia de Biblioteca</h3>
		</div>
		<div class="panel-body">
			<tabset>
				<tab heading="Solicitar" select="previewSolvency(true)">

					<div style="margin-top: 20px; margin-bottom: 10px;">
						<div ng-form="forms.solvencyRequest">

							<div class="form-group" ng-class="{'has-success': (forms.solvencyRequest.$submitted && forms.solvencyRequest.office.$valid),'has-error': (forms.solvencyRequest.$submitted && forms.solvencyRequest.office.$invalid) }">
								<label class="control-label"><i class="fa fa-bank"></i> Sede <sup style="color: red;">*</sup></label>
								<select name="office" data-ng-model="model.solvency.office" required ng-options="obj.shortName for obj in offices" class="form-control"></select>
								<div data-ng-messages="forms.solvencyRequest.$submitted && forms.solvencyRequest.office.$error" class="help-block">
									<div data-ng-message="required">
										- La <b>sede </b> es requerida.
									</div>
								</div>
							</div>


							<div class="form-group" ng-class="{'has-success': (forms.solvencyRequest.$submitted && forms.solvencyRequest.study.$valid),'has-error': (forms.solvencyRequest.$submitted && forms.solvencyRequest.study.$invalid) }">
								<label class="control-label"><i class="fa fa-graduation-cap"></i> Tipo de Estudio <sup style="color: red;">*</sup></label>
								<select name="study" data-ng-model="model.solvency.study" required ng-options="obj.study for obj in studies" class="form-control"></select>
								<div data-ng-messages="forms.solvencyRequest.$submitted && forms.solvencyRequest.study.$error" class="help-block">
									<div data-ng-message="required">
										- El <b>tipo de Estudio </b> es requerida.
									</div>
								</div>
							</div>

							<div class="form-group" ng-class="{'has-success': (forms.solvencyRequest.$submitted && forms.solvencyRequest.specialty.$valid),'has-error': (forms.solvencyRequest.$submitted && forms.solvencyRequest.specialty.$invalid) }">
								<label class="control-label" ><i class="fa fa-map-signs"></i>  Especialidad <sup style="color: red;">*</sup></label>
								<select name="specialty"  data-ng-model="model.solvency.specialty" data-ng-disabled="!model.solvency.study" required ng-options="label for label in model.solvency.study.specialties" class="form-control">
									<option value="">- Seleccione -</option>
								</select>
								<div data-ng-messages="forms.solvencyRequest.$submitted && forms.solvencyRequest.specialty.$error" class="text-danger">
									<div data-ng-message="required">
										- La <b>especialidad</b> es requerida.
									</div>
								</div>
							</div>

							<div class="form-group" ng-class="{'has-success has-feedback': (forms.solvencyRequest.$submitted && forms.solvencyRequest.specialty.$valid),'has-error has-feedback': (forms.solvencyRequest.$submitted && forms.solvencyRequest.name.$invalid) }">
								<label class="control-label" ><i class="fa fa-pencil"></i> Nombres <sup style="color: red;">*</sup></label>
								<input type="text" name="name" ng-model="model.solvency.name" required class="form-control" placeholder="Ingrese sus nombres"  >
								<span ng-show="forms.solvencyRequest.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.solvencyRequest.name.$valid),'glyphicon-remove': ( forms.solvencyRequest.name.$invalid) }" aria-hidden="true"></span>
								<div data-ng-messages="forms.solvencyRequest.$submitted && forms.solvencyRequest.name.$error" class="text-danger">
									<div data-ng-message="required">
										- Los <b>nombres</b> son requeridos.
									</div>
								</div>
							</div>

							<div class="form-group" ng-class="{'has-success has-feedback': (forms.solvencyRequest.$submitted && forms.solvencyRequest.lastName.$valid),'has-error has-feedback': (forms.solvencyRequest.$submitted && forms.solvencyRequest.lastName.$invalid) }">
								<label class="control-label" ><i class="fa fa-pencil"></i> Apellidos <sup style="color: red;">*</sup></label>
								<input type="text" name="lastName" ng-model="model.solvency.lastName" required class="form-control" placeholder="Ingrese sus apellidos" >
								<span ng-show="forms.solvencyRequest.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.solvencyRequest.lastName.$valid),'glyphicon-remove': ( forms.solvencyRequest.lastName.$invalid) }" aria-hidden="true"></span>
								<div data-ng-messages="forms.solvencyRequest.$submitted && forms.solvencyRequest.lastName.$error" class="text-danger">
									<div data-ng-message="required" >
										- Los <b>apellidos</b> son requerido.
									</div>
								</div>
							</div>

							<div class="form-group" ng-class="{'has-success has-feedback': (forms.solvencyRequest.$submitted && forms.solvencyRequest.identityCard.$valid),'has-error has-feedback': (forms.solvencyRequest.$submitted && forms.solvencyRequest.identityCard.$invalid) }">
								<label class="control-label"><i class="fa fa-credit-card"></i> Cédula de identidad <sup style="color: red;">*</sup></label>
								<input type="number" name="identityCard" ng-model="model.solvency.identityCard" required class="form-control" placeholder="Ingrese su cédula de identidad" >
								<span ng-show="forms.solvencyRequest.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.solvencyRequest.identityCard.$valid),'glyphicon-remove': ( forms.solvencyRequest.identityCard.$invalid) }" aria-hidden="true"></span>
								<div data-ng-messages="forms.solvencyRequest.$submitted && forms.solvencyRequest.identityCard.$error" class="text-danger">
									<div data-ng-message="required" >
										- La <b>cédula de identidad</b> es requerida.
									</div>
								</div>
							</div>

							<div class="form-group" ng-class="{'has-success has-feedback': (forms.solvencyRequest.$submitted && forms.solvencyRequest.registration.$valid),'has-error has-feedback': (forms.solvencyRequest.$submitted && forms.solvencyRequest.registration.$invalid) }">
								<label class="control-label"><i class="fa fa-newspaper-o"></i> Matrícula <sup style="color: red;">*</sup></label>
								<input type="text" name="registration" ng-model="model.solvency.registration" required class="form-control" placeholder="Eje: 052" >
								<span ng-show="forms.solvencyRequest.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.solvencyRequest.registration.$valid),'glyphicon-remove': ( forms.solvencyRequest.registration.$invalid) }" aria-hidden="true"></span>
								<div data-ng-messages="forms.solvencyRequest.$submitted && forms.solvencyRequest.registration.$error" class="text-danger">
									<div data-ng-message="required" >
										- La <b>matrícula</b> es requerida.
									</div>
								</div>
							</div>

							<button type="button" ng-click="resetSolvencyRequestForm()" class="btn btn-danger"><i class="fa fa-refresh"></i> Reiniciar</button>
							<button type="submit" class="btn btn-primary" ng-click="print()"><i class="fa fa-send"></i> Enviar solicitud</button>

						</div>
					</div>
					<div class="alert alert-info alert-xs" style="margin-bottom: 0;" role="alert">NOTA: Este superíndice <sup style="color: red;">*</sup> significa que el campo requiere ser completado.</div>

				</tab>
				<tab heading="Solicitudes" select="previewSolvency(false)">
					<div style="margin-top: 10px;">



						<div style="margin-top: 20px; margin-bottom: 10px;">
							<div ng-form="forms.solvencyStatus">
								<div class="form-group" ng-class="{'has-success has-feedback': (forms.solvencyStatus.$submitted && forms.solvencyStatus.identityCard.$valid),'has-error has-feedback': (forms.solvencyStatus.$submitted && forms.solvencyStatus.identityCard.$invalid) }">
									<label class="control-label"><i class="fa fa-credit-card"></i> Cédula de identidad <sup style="color: red;">*</sup></label>
									<input type="number" name="identityCard" ng-model="model.status.identityCard" required class="form-control" placeholder="Ingrese su cédula de identidad" >
									<span ng-show="forms.solvencyRequest.$submitted" class="glyphicon form-control-feedback" ng-class="{'glyphicon-ok': (forms.solvencyRequest.identityCard.$valid),'glyphicon-remove': ( forms.solvencyRequest.identityCard.$invalid) }" aria-hidden="true"></span>
									<div data-ng-messages="forms.solvencyStatus.$submitted && forms.solvencyStatus.identityCard.$error" class="text-danger">
										<div data-ng-message="required" >
											- La <b>cédula de identidad</b> es requerida.
										</div>
									</div>
								</div>

								<button type="button" ng-click="" class="btn btn-danger"><i class="fa fa-refresh"></i> Reiniciar</button>
								<button type="submit" class="btn btn-primary" ng-click="print()"><i class="fa fa-send"></i> Solicitar estatus</button>
							</div>
						</div>



					</div>
				</tab>
			</tabset>
		</div>
	</div>

<!--	style="background-color: aliceblue;"-->

	<div class="panel panel-default non-printable" ng-show="preview" >
		<div class="panel-heading">
			<h3 class="panel-title">Prevista de la solvencia</h3>
		</div>
		<div class="panel-body invalid-background">


			<div class="row">
				<div class="col-xs-2 col-sm-2">
					<img ng-src="assets/images/upel.png" class="img-responsive"  >
				</div>
				<div class="col-xs-8 col-sm-8">
					<p class="text-center"><b>REPÚBLICA BOLIVARIANA DE VENEZUELA</b></p>
					<p class="text-center"><b>UNIVERSIDAD PEDAGÓGICA EXPERIMENTAL LIBERTADOR</b></p>
					<p class="text-center"><b>INSTITUTO PEDAGÓGICO DE </b><b ng-bind="model.solvency.office.shortName | uppercase"></b></p>
					<p class="text-center"><b>SUBDIRECCIÓN DE EXTENSION</b></p>
					<p class="text-center"><b>BIBLIOTECA </b> “<b ng-bind="model.solvency.office.library | uppercase"></b>”</p>
					<p class="text-center"><b ng-bind="model.solvency.office.state | uppercase" ></b></p>
					<p class="text-center"><b>SOLVENCIA</b></p>
				</div>
				<div class="col-xs-2 col-sm-2">
					<img ng-src="{{model.solvency.office.logo}}" class="img-responsive">

				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8">
				</div>
				<div class="col-md-2">
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">

					<p class="text-center"><b><span ng-bind="model.solvency.study.study | uppercase"></span></b></p>

					<br>

					<p>
						Se certifica que el (la) alumno (a): <b><span ng-bind="model.solvency.name | capitalize"></span></b> <span ng-if="!model.solvency.name" >__________</span> <b><span ng-bind="model.solvency.lastName | capitalize"></span></b> <span ng-if="!model.solvency.lastName" >__________</span>,
						Cédula de Identidad: <b><span ng-bind="model.solvency.identityCard"></span></b> <span ng-if="!model.solvency.identityCard" >__________</span>,
						Matrícula: <b><span ng-bind="model.solvency.registration"></span></b> <span ng-if="!model.solvency.registration" >_____</span>,
						culminó <span ng-bind="model.solvency.study.prefix"></span>: <span ng-if="!model.solvency.specialty" >__________</span><b><span ng-bind="model.solvency.specialty"></span></b>
						para la presente fecha se encuentra <b>SOLVENTE</b> con la Unidad de Biblioteca.
					</p>

					<br>

					<p class="text-center">FIRMA DEL FUNCIONARIO DE BIBLIOTECA</p>

					<br>
					<br>

					<p class="text-center">SELLO BIBLIOTECA CENTRAL</p>

					<br>
					<br>

					<p class="text-center">Maturín, <span ng-if="!model.solvency.date">__</span> <span ng-bind="model.solvency.date | date:'dd'"></span> / <span ng-if="!model.solvency.date">__</span> <span ng-bind="model.solvency.date | date:'MM'"></span> / 20<span ng-if="!model.solvency.date">__</span><span ng-bind="model.solvency.date | date:'yy'"></span></p>

					<p>Nota: Va sin enmienda.</p>

				</div>
			</div>

		</div>
	</div>

</section>
