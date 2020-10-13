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
                                <form action="#" class="validation-wizard wizard-circle" id="pre_inscripcion">
                                    <!-- Step 1 -->
                                    <h6>Datos familiares</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">
                                                    Cedula de identidad:
                                                    <span class="danger">*</span>
                                                </label>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="number" class="form-control required" id="ci" name="ci">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button class="btn btn-info" onclick="search_ci($('#ci').val())">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="ResponData" class="row"></div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
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
                                                    <label for="apellido"> 
                                                        Apellidos : 
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="apellido" name="apellido"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="fechanac">
                                                        Fecha de nacimiento :
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <input type="date" class="form-control required" id="fechanac" name="fechanac" onchange="calcularEdad($(this))"> </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="telemerg">
                                                        Posee documento de identidad
                                                    </label>
                                                <div class="form-check text-center align-middle center">
                                                        <label class="custom-control custom-radio">
                                                            <input id="ci_radio_si" name="ci_radio" type="radio" value="si" class="custom-control-input" onclick="">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Si</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="ci_radio_no" name="ci_radio" type="radio" value="no" class="custom-control-input" onclick="ci_escolar()">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="cedula"> 
                                                        Cedula escolar o identidad: 
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <input type="number" class="form-control required" id="cedula" name="cedula">
                                                </div>
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
                                            <div class="col-md-4">  
                                                <div class="form-group">
                                                    <label for="nacionalida">
                                                        Nacionalidad :
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <select class="custom-select form-control required" name="nacionalida" id="nacionalida">
                                                        <option value="null">Seleccione una opcion</option>
                                                        <option value="1">Venezolano</option>
                                                        <option value="0">Extranjero</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="edad">
                                                        Edad :
                                                    </label>
                                                    <input class="form-control" type="number" id="edad" name="edad" disabled>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="edad">
                                                        Grado a optar : 
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <select class="custom-select form-control required" id="grado"  name="grado" aria-required="true" aria-invalid="true">
                                                       <?php $grados= SelectWhere("*","grados","statud=1");
                                                        foreach ($grados as $value) :
                                                        ?>
                                                        <option value="<?php echo $value['id']?>"><?= $value['grado']?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
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
                                                            <input id="Enf_radio_si" name="enf_radio" type="radio" value="si" class="custom-control-input" onclick="active_camp($('#Enf_radio_si'),$('#enfermedad'))">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="Enf_radio_no" name="enf_radio" type="radio" value="no" class="custom-control-input" onclick="disabled_camp($('#Enf_radio_no'),$('#enfermedad'))">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>
                                                    </div>
                                                    <input type="tel" class="form-control" id="enfermedad" name="enfermedad" disabled> 
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
                                                            <input id="Tera_radio_si" name="tera_radio" type="radio" value="si" class="custom-control-input" onclick="active_camp($('#Tera_radio_si'),$('#terapia'))">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="Tera_radio_no" name="tera_radio" type="radio" value="no" class="custom-control-input" onclick="disabled_camp($('#Tera_radio_no'),$('#terapia'))">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>
                                                    </div>
                                                    <input type="tel" class="form-control" id="terapia" name="terapia" disabled> 
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
                                                            <input id="aler_radio_si" name="aler_radio" type="radio" value="si" class="custom-control-input" onclick="active_camp($('#aler_radio_si'),$('#alergico'))">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="aler_radio_no" name="aler_radio" type="radio" value="no" class="custom-control-input" onclick="disabled_camp($('#aler_radio_no'),$('#alergico'))">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>
                                                    </div>
                                                    <input type="tel" class="form-control" id="alergico" name="alergico" disabled> 
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
                                                            <input id="Vacu_radio_si" name="vacu_radio" type="radio" value="si" class="custom-control-input" onclick="activeVacunas($('#Vacu_radio_si'),$('#ckeckbox_vacunas'))">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Si</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="custom-control custom-radio">
                                                            <input id="Vacu_radio_no" name="vacu_radio" type="radio" value="no" class="custom-control-input" onclick="disabledVacunas($('#Vacu_radio_no'),$('#ckeckbox_vacunas'))">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row demo-checkbox" id="ckeckbox_vacunas">
                                                    <?php $vacunas= SelectAll("*","vacunas");
                                                    foreach ($vacunas as $value) :
                                                    ?>
                                                    <div class="form-group col-md-4">
                                                        <input type="checkbox" id="basic_checkbox_<?= $value['id']?>" name="vacuna_<?= trim($value['nombre'],' ')?>" disabled/>
                                                        <label for="basic_checkbox_<?= $value['id']?>">
                                                            <?= $value['nombre']?>      
                                                        </label>
                                                    </div>
                                                    <?php endforeach; ?>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Correo">Correo :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control required" id="Correo" name="Correo">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                                <h6>Hermanos que estudian el plantel</h6>
                                                <button type="button" onclick="search_familiar($('#ci').val())" class="btn btn-info"> Cargar datos</button>
                                            </div>
                                            <div id="ResponDataFamiliar" class="row"></div>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

<script type="text/javascript">
function ci_escolar(){
    var ci = document.getElementById("ci").value;
    var fecha = document.getElementById("fechanac").value;
    var array_fecha = fecha.split('-');
    var fecha_final = array_fecha['0'].substr(-2,2);
    $.ajax({
        type: "GET",
        url: "<?php echo _BASE_URL_;?>scripts/count_familiar.php",
        data: {
            q: ci
        },
        success:(response)=>{
            var response = $.parseJSON(response);
            document.getElementById("cedula").value = response.hermanos+response.ci+fecha_final
        }
    });
}
function calcularEdad(fecha) {
    input = fecha[0];
    var hoy = new Date();
    var cumpleanos = new Date(input.value);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();
    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    document.getElementById("edad").value = edad;
}

function search_ci(ci) {
   $.ajax({
        type: "GET",
        url: "<?php echo _BASE_URL_;?>scripts/search_ci.php",
        data: {
            q: ci
        },
        success: function(response){
            $('#ResponData').append(response);
        }
    });
}
function search_familiar(ci){
    $.ajax({
        type: "GET",
        url: "<?php echo _BASE_URL_;?>scripts/search_familiar.php",
        data: {
            q: ci
        },
        success: function(response){
            $('#ResponDataFamiliar').append(response);
        }
    });
}
function active_camp(radio,input){
    var radio = radio[0];
    var input = input[0];
    if (radio.value == 'si') {
        input.disabled= false;
    }
}
function disabled_camp(radio,input){
    var radio = radio[0];
    var input = input[0];
    if (radio.value == 'no') {
        input.disabled= true;
    }
}

function activeVacunas(radio,container){
    var radio = radio[0];
    var container = container[0].children;
    if (radio.value == 'si') {
        for (var i = 0; i < container.length; i++) {
            var inputContainer = container[i].children;
            var input = inputContainer[0];
            input.disabled = true;
        }
    }

}
function disabledVacunas(radio,container){
    var radio = radio[0];
    var container = container[0].children;
    if (radio.value == 'no') {
        for (var i = 0; i < container.length; i++) {
            var inputContainer = container[i].children;
            var input = inputContainer[0];
            input.disabled = false;
        }
    }

}

$(".tab-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: "Submit"
    },
    onFinished: function (event, currentIndex) {
       swal("Formulario enviado!", "Sus datos fueron almacenados con exito");        
    }
});

var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: "Submit"
    },
    onStepChanging: function (event, currentIndex, newIndex) {
        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    },
    onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    },
    onFinished: function (event, currentIndex) {
        var form_data =$("#pre_inscripcion").serialize();
        $.ajax({
            url: '../scripts/pre_inscripcion.php',
            type: 'POST',
            data: form_data,
            success:(response)=>{
                var response = $.parseJSON(response);
                swal(response.titulo, response.descripcion);
            }
        });   
    }
}),
$(".validation-wizard").validate({
    ignore: "input[type=hidden]",
    errorClass: "text-danger",
    successClass: "text-success",
    highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    },
    unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    },
    errorPlacement: function (error, element) {
        error.insertAfter(element)
    },
    rules: {
        email: {
            email: !0
        }
    }
})
</script>
 <?php include '../footer.php' ?>