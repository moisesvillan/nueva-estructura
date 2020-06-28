 <?php include '../header.php'; ?>
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Email App</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Email App</li>
            </ol>
        </div>
        
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xlg-2 col-lg-4 col-md-4">
                        <div class="card-body inbox-panel"><a href="app-compose.html" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Compose</a>
                            <ul class="list-group list-group-full">
                                <li class="list-group-item active"> <a href="javascript:void(0)"><i class="mdi mdi-gmail"></i> Inbox </a><span class="badge badge-success ml-auto">6</span></li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-star"></i> Starred </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-send"></i> Draft </a><span class="badge badge-danger ml-auto">3</span></li>
                                <li class="list-group-item ">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-file-document-box"></i> Sent Mail </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)"> <i class="mdi mdi-delete"></i> Trash </a>
                                </li>
                            </ul>
                            <h3 class="card-title m-t-40">Labels</h3>
                            <div class="list-group b-0 mail-list"> <a href="#" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Work</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Family</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Private</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Friends</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporate</a> </div>
                        </div>
                    </div>
                    <div class="col-xlg-10 col-lg-8 col-md-8">
                        <div class="card-body">
                            <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-inbox-arrow-down"></i></button>
                                <button type="button" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-alert-octagon"></i></button>
                                <button type="button" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-delete"></i></button>
                            </div>
                            <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary text-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-folder font-18 "></i> </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Dropdown link</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                                </div>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn text-dark btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-label font-18"></i> </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Dropdown link</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                                </div>
                            </div>
                            <button type="button " class="btn btn-secondary m-r-10 m-b-10 text-dark"><i class="mdi mdi-reload font-18"></i></button>
                            <div class="btn-group m-b-10" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn m-b-10 text-dark btn-secondary p-10 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#">Mark as all read</a> <a class="dropdown-item" href="#">Dropdown link</a> </div>
                            </div>
                        </div>
                        <div class="card-body p-t-0">
                            <div class="card b-all shadow-none">
                                <div class="inbox-center table-responsive">
                                    <table class="table table-hover no-wrap">
                                        <tbody>
                                            <tr class="unread">
                                                <td style="width:40px">
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox0" value="check">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td style="width:40px" class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Hritik Roshan</td>
                                                <td class="max-texts"> <a href="app-email-detail.html" /><span class="label label-info m-r-10">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> 12:30 PM </td>
                                            </tr>
                                            <tr class="unread">
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox1" value="check">
                                                        <label for="checkbox1"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star text-warning"></i></td>
                                                <td class="hidden-xs-down">Genelia Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 13 </td>
                                            </tr>
                                            <tr class="unread">
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox2" value="check">
                                                        <label for="checkbox2"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Ritesh Deshmukh</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-success">Elite</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 12 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox3" value="check">
                                                        <label for="checkbox3"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Akshay Kumar</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-warning">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 12 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox4" value="check">
                                                        <label for="checkbox4"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Hritik Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-info m-r-10">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 12 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox5" value="check">
                                                        <label for="checkbox5"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star text-warning"></i></td>
                                                <td class="hidden-xs-down">Genelia Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 11 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox6" value="check">
                                                        <label for="checkbox6"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Ritesh Deshmukh</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-success">Elite</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 11 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox7" value="check">
                                                        <label for="checkbox7"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Akshay Kumar</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-warning">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 11 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox8" value="check">
                                                        <label for="checkbox8"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Hritik Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-info m-r-10">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 10 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox9" value="check">
                                                        <label for="checkbox9"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star text-warning"></i></td>
                                                <td class="hidden-xs-down">Genelia Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 10 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox10" value="check">
                                                        <label for="checkbox10"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Ritesh Deshmukh</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-success">Elite</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 10 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox11" value="check">
                                                        <label for="checkbox11"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Akshay Kumar</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-warning">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 09 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox" id="checkbox12" value="check">
                                                        <label for="checkbox12"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Hritik Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-info m-r-10">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 09 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox13" value="check">
                                                        <label for="checkbox13"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star text-warning"></i></td>
                                                <td class="hidden-xs-down">Genelia Roshan</td>
                                                <td class="max-texts"><a href="app-email-detail.html">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 09 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox14" value="check">
                                                        <label for="checkbox14"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                <td class="hidden-xs-down">Ritesh Deshmukh</td>
                                                <td class="max-texts"><a href="app-email-detail.html"><span class="label label-success">Elite</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 09 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <?php include '../footer.php'; ?>