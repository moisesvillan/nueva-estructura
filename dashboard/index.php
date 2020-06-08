<?php include 'header.php'; ?>
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">Principal</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Principal</a></li>
                        <li class="breadcrumb-item active">editar</li>
                    </ol>
                </div>
            </div>
            <div class="tab-pane" id="settings" role="tabpanel">
                <div class="card-body">
                    <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Phone No</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Select </label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line">
                                    <option>#</option>
                                    <option>#</option>
                                    <option>#</option>
                                    <option>#</option>
                                    <option>#</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">editar editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
<?php include 'footer.php'; ?>