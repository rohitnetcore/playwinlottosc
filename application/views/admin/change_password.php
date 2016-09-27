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
                            <li><a href="#">Change Password</a><span class="divider-last">&nbsp;</span></li>
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
                                    <h4><i class="icon-reorder"></i>Change Password</h4>
                                </div>
                                <div class="widget-body">
                                    <!-- BEGIN FORM-->
                                    <form action="<?php echo site_url(); ?>/admin/update_password" class="form-horizontal" name="change_password" id="change_password" method="post">
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

                                        <?php if(isset($err) && $err != '') { ?>
                                        <div class="alert alert-error">
                                            <button class="close" data-dismiss="alert">×</button>
                                            <?php echo $err; ?>
                                        </div>
                                        <?php } ?>
                                        
                                        <?php if ($this->session->flashdata('success')) { ?>
                                        <div class="alert alert-success">
                                            <button class="close" data-dismiss="alert">×</button>
                                            <?php echo $this->session->flashdata('success'); ?>
                                        </div>
                                        <?php } ?>
                                        
                                        <?php if ($this->session->flashdata('error')) { ?>
                                        <div class="alert alert-error">
                                            <button class="close" data-dismiss="alert">×</button>
                                            <?php echo $this->session->flashdata('error'); ?>
                                        </div>
                                        <?php } ?>
                                        
                                        <div class="control-group">
                                            <label class="control-label">Old Password<font color="red"> *</font></label>
                                            <div class="controls">
                                                <input type="password" placeholder="Old Password" class="input-large" name="old_password"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">New Password<font color="red"> *</font></label>
                                            <div class="controls">
                                                <input type="password" placeholder="New Password" class="input-large" name="new_password" id="new_password"/>
                                                <span class="help-inline"></span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Confirm Password<font color="red"> *</font></label>
                                            <div class="controls">
                                                <input type="password" placeholder="Confirm Password" class="input-large" name="confirm_password"/>
                                                <span class="help-inline"></span>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success"><i class="icon-ok"></i> Update</button>
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