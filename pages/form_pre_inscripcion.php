 <?php include '../header.php'; ?>
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Formulario de pre-inscripcion</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Formulario de pre-inscripcion</li>
                        </ol>
                    </div>
                </div>
                <div class="row" id="validation">
                    <div class="col-12">
                        <div class="card wizard-content">
                            <div class="card-body">
                                <h4 class="card-title">Formulario de pre-inscripcion</h4>
                                <form action="#" class="validation-wizard wizard-circle">
                                    <!-- Step 1 -->
                                    <h6>Datos del alumno</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombre"> 
                                                        Nombres :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="nombre" name="nombre"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlastName2"> 
                                                        Apellidos : 
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="wlastName2" name="lastName"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wemailAddress2"> 
                                                        Cedula escolar o identidad: 
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <input type="number" class="form-control required" id="wemailAddress2" name="emailAddress"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nacionalida">
                                                        Nacionalidad :
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <input type="text" class="form-control required" id="nacionalida" name="nacionalida"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="lnacimiento">
                                                        Lugar de nacimiento : 
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <input class="form-control required" type="text" id="lnacimiento" name="lnacimiento">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fechanac">
                                                        Fecha de nacimiento :
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <input type="date" class="form-control required" id="fechanac" name="fechanac"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="edad">
                                                        Edad : 
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <input class="form-control required" type="number" id="edad" name="edad">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sexo">
                                                        Sexo :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <select class="custom-select form-control required" id="sexo"  name="sexo" aria-required="true" aria-invalid="true">
                                                        <option value="">Seleccione una opcion</option>
                                                        <option value="F">Femenino</option>
                                                        <option value="M">Masculino</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Datos familiares</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="namemadre">
                                                        Nombre del representante Madre:
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="namemadre" name="namemadre">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="edadmadre">
                                                        Edad:
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="number" class="form-control required" id="edadmadre" name="edadmadre"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cimadre">
                                                        Cedula de identidad:
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="number" class="form-control required" id="cimadre" name="cimadre"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ocpmadre">
                                                    Ocupacion:
                                                    <span class="danger">*</span>
                                                </label>
                                                    <input type="text" class="form-control required" id="ocpmadre" name="ocpmadre"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dirtrj">
                                                    Direccion trabajo:
                                                    <span class="danger">*</span>
                                                </label>
                                                    <input type="text" class="form-control required" id="dirtrj" name="dirtrj"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tlftrj">
                                                    Telefono:
                                                    <span class="danger">*</span>
                                                </label>
                                                    <input type="tel" class="form-control required" id="tlftrj" name="tlftrj"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dirfli">
                                                    Direccion Familiar:
                                                    <span class="danger">*</span>
                                                </label>
                                                    <input type="text" class="form-control required" id="dirfli" name="dirfli"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tlcasa">
                                                    Telefono:
                                                    <span class="danger">*</span>
                                                </label>
                                                    <input type="tel" class="form-control required" id="tlcasa" name="tlcasa"> </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="namepadre">
                                                    Nombre del representante padre:
                                                    <span class="danger">*</span>
                                                </label>
                                                    <input type="text" class="form-control required" id="namepadre" name="namepadre">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="edadpadre">
                                                    Edad:
                                                    <span class="danger">*</span>
                                                </label>
                                                    <input type="number" class="form-control required" id="edadpadre" name="edadpadre"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cipadre">
                                                    Cedula de identidad:
                                                    <span class="danger">*</span>
                                                </label>
                                                    <input type="number" class="form-control required" id="cipadre" name="cipadre"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dirapadre">
                                                    Direccion hab. o trabajo:
                                                    <span class="danger">*</span>
                                                </label>
                                                    <input type="text" class="form-control required" id="dirapadre" name="dirapadre"> </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="condicion">
                                                    Con quien vive:
                                                    <span class="danger">*</span>
                                                </label>
                                                    <select class="custom-select form-control required" id="condicion"  name="condicion" aria-required="true" aria-invalid="true">
                                                        <option value="">Seleccione una opcion</option>
                                                        <option value="1">Padre</option>
                                                        <option value="2">Madre</option>
                                                        <option value="3">Ambos</option>
                                                        <option value="4">Con un familiar</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Datos de emergencia</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="telemerg">
                                                        Padece de algun tipo de enfermedad
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="Enf_radio_si" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="Enf_radio_no" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>
                                                    </div>
                                                    <input type="tel" class="form-control" id="enfermedad" name="enfermedad"> 
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="telemerg">
                                                        Asiste a terapia
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="Tera_radio_si" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="Tera_radio_no" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="alergico">
                                                        Es alergico a algun tipo de medicamento o alimento
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="aler_radio_si" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="aler_radio_no" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>
                                                    </div>
                                                    <input type="tel" class="form-control" id="alergico" name="alergico"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="telemerg">
                                                        N° de emergencia
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="tel" class="form-control required" id="telemerg" name="telemerg"> 
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="telemerg">
                                                        Posee todas las vacunas
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="Vacu_radio_si" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="Vacu_radio_no" name="radio" type="radio" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="demo-radio-button">
                                                    <input name="group4" type="radio" id="radio_7" class="radio-col-red" checked="">
                                                    <label for="radio_7">Red</label>
                                                    <input name="group4" type="radio" id="radio_8" class="radio-col-pink">
                                                    <label for="radio_8">Pink</label>
                                                    <input name="group4" type="radio" id="radio_9" class="radio-col-purple">
                                                    <label for="radio_9">Purple</label>
                                                    <input name="group4" type="radio" id="radio_10" class="radio-col-deep-purple">
                                                    <label for="radio_10">Deep Purple</label>
                                                    <input name="group4" type="radio" id="radio_11" class="radio-col-indigo">
                                                    <label for="radio_11">Indigo</label>
                                                    <input name="group4" type="radio" id="radio_12" class="radio-col-blue">
                                                    <label for="radio_12">Blue</label>
                                                    <input name="group4" type="radio" id="radio_13" class="radio-col-light-blue">
                                                    <label for="radio_13">Light Blue</label>
                                                    <input name="group4" type="radio" id="radio_14" class="radio-col-cyan">
                                                    <label for="radio_14">Cyan</label>
                                                    <input name="group4" type="radio" id="radio_15" class="radio-col-teal">
                                                    <label for="radio_15">Teal</label>
                                                    <input name="group4" type="radio" id="radio_16" class="radio-col-green">
                                                    <label for="radio_16">Green</label>
                                                    <input name="group4" type="radio" id="radio_17" class="radio-col-light-green">
                                                    <label for="radio_17">Light Green</label>
                                                    <input name="group4" type="radio" id="radio_18" class="radio-col-lime">
                                                    <label for="radio_18">Lime</label>
                                                    <input name="group4" type="radio" id="radio_19" class="radio-col-yellow">
                                                    <label for="radio_19">Yellow</label>
                                                    <input name="group4" type="radio" id="radio_20" class="radio-col-amber">
                                                    <label for="radio_20">Amber</label>
                                                    <input name="group4" type="radio" id="radio_21" class="radio-col-orange">
                                                    <label for="radio_21">Orange</label>
                                                    <input name="group4" type="radio" id="radio_22" class="radio-col-deep-orange">
                                                    <label for="radio_22">Deep Orange</label>
                                                    <input name="group4" type="radio" id="radio_23" class="radio-col-brown">
                                                    <label for="radio_23">Brown</label>
                                                    <input name="group4" type="radio" id="radio_24" class="radio-col-grey">
                                                    <label for="radio_24">Grey</label>
                                                    <input name="group4" type="radio" id="radio_25" class="radio-col-blue-grey">
                                                    <label for="radio_25">Blue Grey</label>
                                                    <input name="group4" type="radio" id="radio_26" class="radio-col-black">
                                                    <label for="radio_26">Black</label>
                                                </div>
                                            </div>  
                                        </div>
                                    </section>
                                    <!-- Step 4 -->
                                    <h6>Plantel de donde proviene</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="plantelanterior">Plantel de donde proviene :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="plantelanterior" name="plantelanterior">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="religion">Religion :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="religion" name="religion">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                                <h6>Hermanos que estudian el plantel</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nambebro1">Nombre :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="nambebro1" name="nambebro1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="gradobro1">Grado :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="gradobro1" name="gradobro1">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nambebro2">Nombre :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="nambebro2" name="nambebro2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="gradobro2">Grado :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="gradobro2" name="gradobro2">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nambebro3">Nombre :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="nambebro3" name="nambebro3">
                                                </div>
                                                <div class="form-group">
                                                    <label for="gradobro3">Grado :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="gradobro3" name="gradobro3">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Correo">Correo :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="Correo" name="Correo">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
 <?php include '../footer.php' ?>