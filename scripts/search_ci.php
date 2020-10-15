<?php
include 'functions.php';

connect_mysqli();
$data = SelectWhere('*','familiares',"id='".$_GET['q']."'");
?>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telemerg">
                Cedula
                <span class="danger">*</span>
            </label>
			<input type='text' disabled id='id' name='id' value="<?php echo $_GET['q']?>" class='form-control required'>
		</div> 
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telemerg">
                Nombres
                <span class="danger">*</span>
            </label>
			<input type='text'  id='nombrePre'  name='nombrePre' class='form-control required'  value="<?php if(empty($data[0]["nombre"])): echo ''; else: echo $data[0]["nombre"]; endif; ?>">
		</div> 
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telemerg">
                Apellidos
                <span class="danger">*</span>
            </label>
			<input type='text'  id='apellidoPre'  name='apellidoPre' class='form-control required'  value="<?php if(empty($data[0]["apellido"])): echo ''; else: echo $data[0]["apellido"]; endif; ?>">
		</div> 
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telemerg">
                Ocupacion
                <span class="danger">*</span>
            </label>
			<input type='text'  id='ocupacion'  name='ocupacion' class='form-control required'  value="<?php if(empty($data[0]["ocupacion"])): echo ''; else: echo $data[0]["ocupacion"]; endif; ?>">
		</div> 
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telemerg">
                Direccion del trabajo
                <span class="danger">*</span>
            </label>
            <input type='text'  id='Dtrabajo'  name='Dtrabajo' class='form-control required'  value="<?php if(empty($data[0]["Dtrabajo"])): echo ''; else: echo $data[0]["Dtrabajo"]; endif; ?>">
		</div> 
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telemerg">
                Telefono del trabajo
                <span class="danger">*</span>
            </label>
            <input type='text'  id='Tlftrabajo'  name='Tlftrabajo' class='form-control required'  value="<?php if(empty($data[0]["Tlftrabajo"])): echo ''; else: echo $data[0]["Tlftrabajo"]; endif; ?>">
		</div> 
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telemerg">
                Direccion del hogar
                <span class="danger">*</span>
            </label>
            <input type='text'  id='DHogar'  name='DHogar' class='form-control required'  value="<?php if(empty($data[0]["DHogar"])): echo ''; else: echo $data[0]["DHogar"]; endif; ?>">
		</div> 
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telemerg">
                Telefono del Hogar
                <span class="danger">*</span>
            </label>
            <input type='text'  id='TlfHogar'  name='TlfHogar' class='form-control required'  value="<?php if(empty($data[0]["TlfHogar"])): echo ''; else: echo $data[0]["TlfHogar"]; endif; ?>">
		</div> 
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telemerg">
                Parestesco
                <span class="danger">*</span>
            </label>
			<select name="Parestesco" id="Parestesco" class="custom-select form-control required">
				<?php if(empty($data[0]["Parestesco"])): ?>
					<option value="NULL">Seleccione un opcion</option>
					<option value="1">Madre</option>
					<option value="2">Padre</option>
					<option value="3">Familiar a cargo</option>
					
				<?php else: ?>
					<?php switch ($data[0]["Parestesco"]) {
						case '1':
						?>
							<option value="0" selected>Madre</option>
							<option value="1">Padre</option>
							<option value="2">Familiar a cargo</option>
						<?php
							
							break;
						case '2':
						?>
							<option value="1" selected>Padre</option>
							<option value="0">Madre</option>
							<option value="2">Familiar a cargo</option>
						<?php
							break;
						case '3':
						?>
							<option value="2" selected>Familiar a cargo</option>
							<option value="0">Madre</option>
							<option value="1">Padre</option>
						<?php
							break;
					} ?>
				<?php endif; ?>
				
			</select>
		</div> 
	</div>
	<div class="col-md-12 divider">
		<hr>
	</div>



