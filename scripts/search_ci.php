<?php
include 'functions.php';

connect_mysqli();
$data = SelectWhere('*','familiares',"id='".$_GET['q']."'");
?>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telemerg">
                Cédula
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
                Ocupación
                <span class="danger">*</span>
            </label>
			<input type='text'  id='ocupacion'  name='ocupacion' class='form-control required'  value="<?php if(empty($data[0]["ocupacion"])): echo ''; else: echo $data[0]["ocupacion"]; endif; ?>">
		</div> 
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telemerg">
                Dirección del Trabajo
                <span class="danger">*</span>
            </label>
            <input type='text'  id='Dtrabajo'  name='Dtrabajo' class='form-control required'  value="<?php if(empty($data[0]["Dtrabajo"])): echo ''; else: echo $data[0]["Dtrabajo"]; endif; ?>">
		</div> 
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="telemerg">
                Teléfono del Trabajo
                <span class="danger">*</span>
            </label>
            <input type='text'  id='Tlftrabajo'  name='Tlftrabajo' class='form-control required'  value="<?php if(empty($data[0]["Tlftrabajo"])): echo ''; else: echo $data[0]["Tlftrabajo"]; endif; ?>">
		</div> 
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="telemerg">
                Dirección del Hogar
                <span class="danger">*</span>
            </label>
            <input type='text'  id='DHogar'  name='DHogar' class='form-control required'  value="<?php if(empty($data[0]["DHogar"])): echo ''; else: echo $data[0]["DHogar"]; endif; ?>">
		</div> 
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="telemerg">
                Parestesco
                <span class="danger">*</span>
            </label>
			<select name="Parestesco" id="Parestesco" class="custom-select form-control required">
				<?php if(empty($data[0]["Parestesco"])): ?>
					<option value="NULL">Seleccione un Opción</option>
					<option value="1">Madre</option>
					<option value="2">Padre</option>
					<option value="3">Familiar a Cargo</option>
					
				<?php else: ?>
					<?php switch ($data[0]["Parestesco"]) {
						case '1':
						?>
							<option value="1" selected>Madre</option>
							<option value="2">Padre</option>
							<option value="3">Familiar a Cargo</option>
						<?php
							
							break;
						case '2':
						?>
							<option value="2" selected>Padre</option>
							<option value="1">Madre</option>
							<option value="3">Familiar a Cargo</option>
						<?php
							break;
						case '3':
						?>
							<option value="3" selected>Familiar a Cargo</option>
							<option value="1">Madre</option>
							<option value="2">Padre</option>
						<?php
							break;
					} ?>
				<?php endif; ?>
				
			</select>
		</div> 
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="telemerg">
                Teléfono del Hogar
                <span class="danger">*</span>
            </label>
            <input type='text'  id='TlfHogar'  name='TlfHogar' class='form-control required'  value="<?php if(empty($data[0]["TlfHogar"])): echo ''; else: echo $data[0]["TlfHogar"]; endif; ?>">
		</div> 
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="">Nacionalidad</label>
			<select name="nacionalidad" id="nacionalidad" class="form-control">
				<?php if(empty($data[0]["nacionalidad"])): ?>
					<option value="NULL">Seleccione un Opción</option>
					<option value="V">Venezolano</option>
					<option value="E">Extranjero</option>
					
				<?php else: ?>
					<?php switch ($data[0]["nacionalidad"]) {
						case 'V':
						?>
							<option value="V" selected>Venezolano</option>
							<option value="E">Extranjero</option>
						<?php
							
							break;
						case 'E':
						?>
							<option value="E" selected>Extranjero</option>
							<option value="V">Venezolano</option>
						<?php
							break;
						?>
					<?php } ?>
				<?php endif; ?>
			</select>
		</div>
	</div>
	<div class="col-md-12 divider">
		<hr>
	</div>



