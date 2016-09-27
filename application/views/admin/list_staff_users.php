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
    <?php $this->load->view('common/list_css'); ?>
    
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">

    <?php $this->load->view('common/header'); ?>

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
                                <li><a href="#">Manage Users</a><span class="divider-last">&nbsp;</span></li>
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->

                    <!-- BEGIN ADVANCED TABLE widget-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN EXAMPLE TABLE widget-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>List Users</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="portlet-body">
                                        <div class="clearfix">
                                            <div class="btn-group">
                                                <a href="<?php echo site_url('admin/add_staff_user'); ?>">
                                                    <button id="" class="btn btn-warning">
                                                        Add New <i class="icon-plus"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="space15"></div>
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
                                        
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Contact Number</th>
                                                    <th>Created Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sn_count = 1;
                                                if ($result) {
                                                    foreach ($result as $val) {
                                                        ?>
                                                        <tr class="">
                                                            <td><?php echo $val['name']; ?></td>
                                                            <td><?php echo $val['username']; ?></td>
                                                            <td><?php echo $val['email']; ?></td>
                                                            <td><?php echo $val['mobile_no']; ?></td>
                                                            <td><?php echo date('d-m-Y',strtotime($val['create_date']));
                                                            $sn_count++; ?></td>
                                                            <td><?php if($val['status'] == 't') { ?><span class="label label-success">Active</span><?php } else { ?><span class="label label-danger">Inactive</span><?php } ?></td>
                                                            <td>


                                                                <a class="" style="text-decoration:none;padding-left:5px;" href="<?php echo site_url('admin/edit_staff_user?staff_id=' . $val['id']); ?>"><img src="<?php echo base_url(); ?>img/698652-icon-136-document-edit-128.png" style="width:20px;" alt="Edit" title="Edit"/></a>&nbsp;&nbsp;
                                                                
                                                                <?php if($val['status'] == 't') { ?>
                                                                <a class="" href="<?php echo site_url('admin/update_user_status?status=f&userid=' .$val['id']); ?>"><img src="<?php echo base_url(); ?>img/deactivate.gif" alt="Click to deactivate" title="Click to deactivate"/></a>&nbsp;&nbsp;
                                                                <?php } else { ?>
                                                                <a class="" href="<?php echo site_url('admin/update_user_status?status=t&userid=' .$val['id']); ?>"><img src="<?php echo base_url(); ?>img/activate.gif" alt="Click to activate" title="Click to activate"/></a>&nbsp;&nbsp;
                                                                <?php } ?>


                                                                <a class="" style="text-decoration:none" data-toggle="modal" role="button" href="#myModal<?php echo $val['id']; ?>"><img src="<?php echo base_url(); ?>img/trash.png" style="width:18px;" alt="Delete" title="Delete"/></a>
                                                                

                                                                <div aria-hidden="true" aria-labelledby="myModalLabel1" role="dialog" tabindex="-1" class="modal hide fade" id="myModal<?php echo $val['id']; ?>">
                                                                    <div class="modal-header">
                                                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                                        <h3 id="myModalLabel1">Delete Data</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete?</p>
                                                                    </div>	
                                                                    <div class="modal-footer">
                                                                        <button aria-hidden="true" data-dismiss="modal" class="btn">Close</button>
                                                                        <a href="<?php echo site_url('admin/delete_staff_user?staff_id=' . $val['id']); ?>"><button class="btn btn-primary">OK</button></a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE widget-->
                        </div>
                    </div>

                    <!-- END ADVANCED TABLE widget-->

                    <!-- END PAGE CONTENT-->
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->
        </div>

          <?php $this->load->view('common/footer'); ?>
          <?php $this->load->view('common/common_js.php'); ?>
          <?php $this->load->view('common/list_js.php'); ?>

</body>
<!-- END BODY -->
</html>
