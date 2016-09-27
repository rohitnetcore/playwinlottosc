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
                        <li><a href="<?php echo site_url('admin/manage_staff_user'); ?>">Manage Users</a><span class="divider">&nbsp;</span></li>
                        <li><a href="#">Add User</a><span class="divider-last">&nbsp;</span></li>
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
                                <h4><i class="icon-reorder"></i> <a href="<?php echo site_url('admin/manage_staff_user'); ?>">List Users</a> / Add User</h4>
                            </div>
                            <div class="widget-body">
                                <!-- BEGIN FORM-->
                                <form action="<?php echo site_url(); ?>/admin/insert_staff_user" class="form-horizontal" name="add_staff_user" id="add_staff_user" method="post">
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
                                    
                                    <?php if (validation_errors()) { ?>
                                    <div class="alert alert-error">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <span><?php echo validation_errors(); ?></span>
                                    </div>
                                    <?php } ?>
                                    <div class="control-group">
                                        <label class="control-label">Name<font color="red"> *</font></label>
                                        <div class="controls">
                                            <input type="text" placeholder="First name Last name" class="input-xlarge" name="staff_name"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Username<font color="red"> *</font></label>
                                        <div class="controls">
                                            <input type="text" placeholder="Username" class="input-xlarge" name="username"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Password<font color="red"> *</font></label>
                                        <div class="controls">
                                            <input type="password" id="password" placeholder="Password" class="input-xlarge" name="password"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Confirm Password<font color="red"> *</font></label>
                                        <div class="controls">
                                            <input type="password" placeholder="Confirm Password" class="input-xlarge" name="confirm_password"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Email<font color="red"> *</font></label>
                                        <div class="controls">
                                            <input type="text" placeholder="Email" class="input-xlarge" name="email"/>
                                            <span class="help-inline"></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Phone No<font color="red"> *</font></label>
                                        <div class="controls">
                                            <input type="text" placeholder="Phone No" class="input-xlarge" name="phone_no"/>
                                            <span class="help-inline"></span>
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