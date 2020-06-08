<?php include 'header.php'; ?>
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Principal</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Principal</a></li>
                            <li class="breadcrumb-item active">Consulta</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                
                            </div>
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                
                               
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">IMPORTAR DATA</h4>
                                <h6 class="card-subtitle">Exportar Data . PDF , EXCEL , CSV , COPIAR & PRINT</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                                         <tr>
                                                <th>Cédula</th>
                                                <th>Primer Apellido</th>
                                                <th>Segundo Apellido</th>
                                                <th>Primer Nombre</th>
                                                <th>Segundo Nombre</th>
                                                <th>Sexo</th>
                                               <th>Fecha de Nacimiento</th>
                                                    <th>Lugar de Nacimiento</th>
                                                       <th>Correo Electronico</th>
                                                      
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>Cédula</th>
                                                <th>Primer Apellido</th>
                                                <th>Segundo Apellido</th>
                                                <th>Primer Nombre</th>
                                                <th>Segundo Nombre</th>
                                                <th>Sexo</th>
                                            <th>Fecha de Nacimiento</th>
                                            <th>Lugar de Nacimiento</th>
                                            <th>Correo Electronico</th>
                                               
          
                                            </tr>
                                            
                                        </tfoot>
                                        <?php include '../scripts/sql-consultas.php'; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php include 'footer.php'; ?>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="6">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        /*buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]*/
    });
    </script>