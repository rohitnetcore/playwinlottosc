<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->

<script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="js/excanvas.js"></script>
<script src="js/respond.js"></script>
<![endif]-->

<!-- END JAVASCRIPTS -->

<script src="<?php echo base_url(); ?>js/scripts.js"></script>
<script src="<?php echo base_url(); ?>js/ui-jqueryui.js"></script>

<script type="text/javascript">
    $('#footer .go-top').click(function () {
        //pos = this ? this.offset().top : 0;
            $('html,body').animate({
                scrollTop: 0
            }, 'slow');
    });
</script>

<script type="text/javascript">
    $(function () {
      $(document).bind('contextmenu', function (e) {
        e.preventDefault();
      });
    });
</script>
