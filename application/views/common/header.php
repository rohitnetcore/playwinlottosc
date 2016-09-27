
    <div id="header" class="navbar navbar-inverse navbar-fixed-top">
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <div class="container-fluid">
                <!-- BEGIN LOGO -->
<!--                    <a class="brand" href="<?php //echo site_url('admin'); ?>" style="float:left">
                    <img alt="<?php //echo $site_details['site_name']; ?>" title="<?php //echo $site_details['site_name']; ?>" src="<?php //echo base_url(); ?>/uploads/images/<?php //echo $site_details['site_logo']; ?>" style="height:60px; width:70px;">
                </a>-->
                <!-- END LOGO -->
                <div id="top_menu" class="nav notify-row" style="">
                    <!-- BEGIN NOTIFICATION -->
                    <ul class="nav top-menu">
                        <li>
                            <img src="http://www.netcore.in/wp-content/themes/netcore/images/logo.jpg" style="width:100px;padding:0px;margin-right:20px;"/>
                        </li>

                            <li class="element <?php if($this->uri->segment(1) == "admin" && $this->uri->segment(2) == '') echo 'active'; ?>">
                                <a href="<?php echo site_url('admin'); ?>" class="" style="color:#ffffff">
                                    <span class="icon-box"> <i class="icon-dashboard"></i></span> Dashboard
                                    <span class=""></span>
                                </a>
                            </li>

                            <?php if($this->session->userdata('user_type') == 'admin'){ ?>
                            <li class="element <?php if($this->uri->segment(2) == 'manage_staff_user') echo 'active'; ?>">
                                <a href="<?php echo site_url('admin/manage_staff_user'); ?>" class="" style="color:#ffffff">
                                    <span class="icon-box"><i class="icon-group"></i></span> Manage Users
                                    <span class=""></span>
                                </a>
                            </li>
                            <?php } ?>

                            <li class="element <?php if($this->uri->segment(2) == 'list_winner_reports') echo 'active'; ?>">
                                <a href="<?php echo site_url('winner_reports/list_winner_reports'); ?>" class="" style="color:#ffffff">
                                    <span class="icon-box"><i class="icon-list"></i></span> Winner Reports
                                    <span class=""></span>
                                </a>
                            </li>

                            <li class="element <?php if($this->uri->segment(2) == 'list_log_reports') echo 'active'; ?>">
                                <a href="<?php echo site_url('log_reports/list_log_reports'); ?>" class="" style="color:#ffffff">
                                    <span class="icon-box"><i class="icon-list"></i></span> Log Reports
                                    <span class=""></span>
                                </a>
                            </li>

                            <li class="element <?php if($this->uri->segment(2) == 'list_alert_reports') echo 'active'; ?>">
                                <a href="<?php echo site_url('alert_reports/list_alert_reports'); ?>" class="" style="color:#ffffff">
                                    <span class="icon-box"><i class="icon-list"></i></span> SMS to Non-Winners
                                    <span class=""></span>
                                </a>
                            </li>


                    </ul>
                </div>
                <!-- END  NOTIFICATION -->
                <div class="top-nav ">
                    <ul class="nav pull-right top-menu" >
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown <?php if($this->uri->segment(2) == 'show_user_profile' || $this->uri->segment(2) == 'change_password' || $this->uri->segment(2) == 'show_user_profile') echo 'active'; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#ffffff">
                                <span class="username"><?php echo $this->session->userdata('name'); ?></span>
                                <b class="caret" style="border-bottom-color: #FFFFFF; border-top-color: #FFFFFF;"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <!--li><a href="<?php echo site_url();?>/admin/show_user_profile"><i class="icon-user"></i> My Profile</a></li-->
                                <?php if($this->session->userdata('user_type') == 'admin'){ ?>
<!--                                    <li class="divider"></li>
                                <li><a href="<?php echo site_url();?>/admin/show_site_details"><i class="icon-book"></i> Site Details</a></li>-->
                                <?php } ?>
                                <!--li class="divider"></li-->
                                <li><a href="<?php echo site_url();?>/admin/change_password"><i class="icon-lock"></i> Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url(); ?>/login/do_logout"><i class="icon-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
