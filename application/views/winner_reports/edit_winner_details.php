<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Netcore</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <?php $this->load->view('common/common_css'); ?>
    <?php $this->load->view('common/form_css'); ?>
    
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">

    <?php $this->load->view('common/header'); ?>

        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid sidebar-closed">
            <!-- BEGIN PAGE -->
            <div id="main-content">
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                            <ul class="breadcrumb">
                                <li>
                                    <a href="<?php echo site_url('admin'); ?>"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                                </li>
                               
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div id="page" class="dashboard">

                        <div class="row-fluid">
                            <div class="span12">
                                <!-- BEGIN SAMPLE FORMPORTLET-->
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4><i class="icon-reorder"></i>  <a href="<?php echo site_url('winner_reports/list_winner_reports'); ?>">Winner Reports</a> / Edit Winner Details</h4>
                                    </div>
                                    <div class="widget-body">


                                        <?php if (validation_errors()) { ?>
                                            <div class="alert alert-error">
                                                <button class="close" data-dismiss="alert">×</button>
                                                <span><?php echo validation_errors(); ?></span>
                                            </div>
                                        <?php } ?>

                                        <!-- BEGIN FORM-->
                                        <form action="<?php echo site_url(); ?>/winner_reports/update_winner_details" class="form-horizontal" name="edit_winner" id="edit_winner" method="post">


                                             <div class="alert alert-error hide">
                                                <button class="close" data-dismiss="alert">×</button>
                                                You have some form errors. Please check below.
                                            </div>

                                            <div class="alert alert-success hide">
                                                <button class="close" data-dismiss="alert">×</button>
                                                Your form validation is successful!
                                            </div>
                                            
                                            <?php if(isset($msg) && $msg != '') { ?>
                                            <div class="alert alert-success">
                                                <button class="close" data-dismiss="alert">×</button>
                                                <?php echo $msg; ?>
                                            </div>
                                            <?php } ?>

                                          

                                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">


                                            <div class="control-group">
                                                <label class="control-label">Name<font color="red"></font></label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Name" class="input-xlarge" value="<?php echo $result['name']; ?>" disabled/>
                                                </div>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label">Circle<font color="red"></font></label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Circle" class="input-xlarge" value="<?php echo $result['circle']; ?>" disabled/>
                                                </div>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label">Operator<font color="red"></font></label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Operator" class="input-xlarge" value="<?php echo $result['operator']; ?>" disabled/>
                                                </div>
                                            </div>



                                            <div class="control-group">
                                                <label class="control-label">Shipment/Tracking No<font color="red"> *</font></label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Name" class="input-xlarge" name="pod" value="<?php echo $result['pod']; ?>"/>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label">Courier Partner Name<font color="red"> *</font></label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Courier Partner Name" class="input-xlarge" name="courier_partner" value="<?php echo $result['courier_partner']; ?>"/>
                                                </div>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label">Address<font color="red"> *</font></label>
                                                <div class="controls">
                                                    <textarea style='width:500px;' cols="100" rows="4" name="address"><?php echo $result['address']; ?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-success"><i class="icon-ok"></i> Submit</button>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                        </div>
                    </div>			
                </div>
            </div>
        </div>

      <?php $this->load->view('common/footer'); ?>
      <?php $this->load->view('common/common_js.php'); ?>
      <?php $this->load->view('common/form_js.php'); ?>

</body>
<!-- END BODY -->
</html>