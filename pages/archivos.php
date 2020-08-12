<?php include '../header.php'; ?>

<div class="container-fluid">
	<div class="row page-titles">
	    <div class="col-md-5 col-8 align-self-center">
	        <h3 class="text-themecolor m-b-0 m-t-0">Archivos</h3>
	        <ol class="breadcrumb">
	            <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
	            <li class="breadcrumb-item active">Archivos</li>
	        </ol>
	    </div>
	</div>
	<div class="row">
	    <div class="col-12">
	        <div class="card">
                <div class="card-body">
                    <?php include '../plugins/simple-file-manager/index.php'; ?>
	            </div>
	        </div>
	    </div> 
	</div>
</div>

<?php include '../footer.php'; ?>