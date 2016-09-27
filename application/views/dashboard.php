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
                        <ul class="breadcrumb">
                            <li>
                                <a href="<?php echo site_url('admin'); ?>"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                            </li>
                            <li><a href="#">Dashboard</a><span class="divider-last">&nbsp;</span></li>
                        </ul>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->

                <div class="dashboard" id="page">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Dashboard</h4>
                                </div>
                                <div class="widget-body">

                                    <!-- BEGIN OVERVIEW STATISTIC BARS-->
                                    <div class="row-fluid circle-state-overview">

                                        <?php if($this->session->userdata('user_type') == 'admin'){ ?>
                                        <a href="<?php echo site_url('admin/manage_staff_user'); ?>">
                                            <div data-desktop="span2" data-tablet="span3" class="span2 responsive">
                                                <div class="circle-wrap">
                                                    <div class="stats-circle green-color">
                                                        <i class="icon-group"></i>
                                                    </div>
                                                    <p>
                                                        <strong>Manage Users</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <?php } ?>

                                        <a href="<?php echo site_url('winner_reports/list_winner_reports'); ?>">
                                            <div data-desktop="span2" data-tablet="span3" class="span2 responsive">
                                                <div class="circle-wrap">
                                                    <div class="stats-circle green-color">
                                                        <i class="icon-list"></i>
                                                    </div>
                                                    <p>
                                                        <strong>Winner Reports</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="<?php echo site_url('log_reports/list_log_reports'); ?>">
                                            <div data-desktop="span2" data-tablet="span3" class="span2 responsive">
                                                <div class="circle-wrap">
                                                    <div class="stats-circle green-color">
                                                        <i class="icon-list"></i>
                                                    </div>
                                                    <p>
                                                        <strong>Log Reports</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>


                                        <a href="<?php echo site_url('alert_reports/list_alert_reports'); ?>">
                                            <div data-desktop="span2" data-tablet="span3" class="span2 responsive">
                                                <div class="circle-wrap">
                                                    <div class="stats-circle green-color">
                                                        <i class="icon-list"></i>
                                                    </div>
                                                    <p>
                                                        <strong>SMS to Non-Winners</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>



                                        <!-- END OVERVIEW STATISTIC BARS-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BEGIN ADVANCED TABLE widget-->


                <!-- END ADVANCED TABLE widget-->

                <!-- END PAGE CONTENT-->
            </div>
            <!-- END PAGE CONTAINER-->
        </div>
        <!-- END PAGE -->
    </div>

    <?php $this->load->view('common/footer'); ?>
    <?php $this->load->view('common/common_js.php'); ?>

</body>
<!-- END BODY -->
</html>
