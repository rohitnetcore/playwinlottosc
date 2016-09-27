<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Login page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-fileupload.css" />
  <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>css/style_responsive.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>css/style_default.css" rel="stylesheet" id="style_color" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/fancybox/source/jquery.fancybox.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/uniform/css/uniform.default.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/chosen-bootstrap/chosen/chosen.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="login-body">
  <div class="login-header">
      <!-- BEGIN LOGO -->
<!--      <a class="brand">
          <img alt="<?php echo $site_details['site_name']; ?>" title="<?php echo $site_details['site_name']; ?>" src="<?php echo base_url(); ?>/uploads/images/<?php echo $site_details['site_logo']; ?>" style="height:60px;width:110px;float:left;"/>
      </a>-->
      <div id="logo" class="center">
<!--          <img src="<?php echo base_url(); ?>img/logo.png" alt="logo" class="center" />-->
          <h4 style="color: white;"><?php echo $site_details['site_name']; ?></h4>
      </div>
      <!-- END LOGO -->
  </div>

  <!-- BEGIN LOGIN -->
  <div id="login">       
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgotform" name="forgotform" class="form-vertical no-padding no-margin" action="<?php echo site_url(); ?>/login/forgotpwd" method="post">
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
        
      <p class="center">Enter your e-mail address below to reset your password.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" type="text" name="email" placeholder="Email" autocomplete="off" />
          </div>
        </div>
        <div class="space20"></div>
      </div>
      <input type="submit" id="forget-btn" class="btn btn-block login-btn" value="Submit"/>
      <div class="mtop10">
      <div class="pull-right">
           <a href="<?php echo site_url('login'); ?>" class="" id=""><i class="icon-user"></i> Go To Login</a>
      </div>
      </div>
      <div class="clearfix space5"></div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
    <?php echo $site_details['site_name']; ?> @All Rights reserved
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.blockui.js"></script>
  <script src="<?php echo base_url(); ?>assets/scripts/form_validation.js"></script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>