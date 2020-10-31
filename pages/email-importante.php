 <?php include '../header.php'; ?>
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Correo</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Correo</li>
            </ol>
        </div>
        
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xlg-2 col-lg-3 col-md-3">
                        <?php include '../layout/correo-sidabar.php' ?>
                    </div>
                    <div class="col-xlg-10 col-lg-9 col-md-9">
                        <div class="card-body">
                            <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                <a href="email-send.php" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-inbox-arrow-down"></i> Nuevo Correo</a>
                            </div>
                        </div>
                        <div class="card-body p-t-0">
                            <div class="card b-all shadow-none">
                                <div class="inbox-center table-responsive">
                                    <table class="table table-hover no-wrap">
                                        <tbody>
                                            <?php $data = SelectWhere('*','Correo',"importante=1 AND borrado=0 AND para = '".$_SESSION['id']."'") ?>
                                            <?php 
                                            if (count($data)>0):
                                                foreach ($data as $value) :
                                                    ?>
                                                    <tr class="unread">
                                                        <td valign="middle">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="checkbox0" value="check">
                                                                <label for="checkbox0"></label>
                                                            </div>
                                                        </td>
                                                        <?php if($value['adjunto'] != '' && $value['adjunto'] != ''):?>
                                                            <td class="hidden-xs-down">
                                                            <i class="fa fa-star-o"></i><i class="ml-3 fa fa-paperclip"></i>
                                                        </td>
                                                        <?php elseif ($value['importante'] != ''):?>
                                                            <td class="hidden-xs-down">
                                                                <i class="ml-3 fa fa-paperclip"></i>
                                                            </td>
                                                        <?php elseif($value['adjunto'] != ''):?>
                                                            <td class="hidden-xs-down">
                                                                <i class="ml-3 fa fa-paperclip"></i>
                                                            </td>
                                                        <?php endif?>
                                                        <td class="hidden-xs-down"><?php echo $value['de']?></td>
                                                        <td class="max-texts">
                                                            <a href="email-detail.php?id=<?php echo $value['id']?>" title="">
                                                                <?php echo $value['asunto']?>
                                                            </a>
                                                        </td>
                                                        <td class="text-right">
                                                            <?php echo $value['fecha']?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td align="center" valign="middle">
                                                        <h3>No posee mensajes asociados a su cuenta</h3> 
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
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