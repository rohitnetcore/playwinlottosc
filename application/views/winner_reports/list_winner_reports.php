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
  <?php $this->load->view('common/form_css'); ?>

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
              <li><a href="#">Log Reports</a><span class="divider-last">&nbsp;</span></li>
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
                <h4><i class="icon-reorder"></i>Log Reports</h4>
              </div>
              <div class="widget-body">
                <div class="portlet-body">

                  <div class="space15"></div>

                  <?php if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                  } ?>

                  <div id="export_excel" style="margin-right: 50px;" class="btn-group pull-right">
                            <a class="btn btn-success" style="" href="javascript:download_excel();">Export to CSV</a>
                  </div>

                  <div style="width:100%;overflow: auto;overflow-y: hidden;;">
                    <br>  
                    <form name="list_reports" id="list_reports" method="get" action="<?php echo site_url(); ?>/winner_reports/list_winner_reports">

                      <input id="download_file" type="hidden" name="download_file">

                      <div style="float:left;" class="input" id="ui_date_picker_range_from">
                        <input type="text" style="width:150px;" class="input-sm form-control" name="date_from" id="date_from" placeholder="from date" value="<?php if(isset($date_from)){ echo $date_from;} ?>"/>
                      </div>

                      <div style="float:left;" class="input" id="ui_date_picker_range_to">
                        &nbsp; to <input type="text" style="width:150px;" class="input-sm form-control" name="date_to" id="date_to" placeholder="to date" value="<?php if(isset($date_to)){ echo $date_to;} ?>"/>
                      </div>

                      <div style="float:left;">&nbsp;
                        <select style="width:130px;" name="circle">
                          <option value="">Select Circle</option>
                          <?php  foreach ($circles as $val) {  ?>
                          <option value="<?php echo $val['circle']; ?>" 
                            <?php if(isset($circle)){
                              if($val['circle']==$circle){
                                echo "selected";
                              } } ?>
                              ><?php echo $val['circle']; ?></option>
                              <?php } ?>
                            </select>
                          </div>

                          <div style="float:left;">&nbsp;
                            <select style="width:130px;" name="gift_won">
                              <option value="">Select Gift</option>
                              <option value="Silver Coin" <?php if(isset($gift_won)){ if('Silver Coin'==$gift_won){ echo "selected";} } ?> >Silver Coin</option>
                              <option value="Gold Coin" <?php if(isset($gift_won)){ if('Gold Coin'==$gift_won){ echo "selected";} } ?>  >Gold Coin</option>
                            </select>
                          </div>

                         <div style="float:left;">&nbsp;
                            <select style="width:130px;" name="sms_status">
                              <option value="">Select Status</option>
                              <option value="1" <?php if(isset($sms_status)){ if('1'==$sms_status){ echo "selected";} } ?> >Sent</option>
                              <option value="0" <?php if(isset($sms_status)){ if('0'==$sms_status){ echo "selected";} } ?>  >Not Sent</option>
                            </select>
                          </div>
 

                          <div style="float:left;">&nbsp;
                            &nbsp; <input type="text" style="width:120px;" class="input-sm form-control" name="name" id="name" placeholder="Search Name" value="<?php if(isset($name)){ echo $name;} ?>"/>
                          </div>

                          <div style="float:left;">&nbsp;
                            &nbsp; <input type="text" style="width:150px;" class="input-sm form-control" name="pod" id="pod" placeholder="Search Tracking No" value="<?php if(isset($pod)){ echo $pod;} ?>"/>
                          </div>

                          <div style="float:left;">&nbsp;
                            &nbsp; <input type="text" style="width:120px;" class="input-sm form-control" name="msisdn" id="msisdn" placeholder="Search Mobile" value="<?php if(isset($msisdn)){ echo $msisdn;} ?>"/>
                          </div> 

                          <div style="float:left;">
                            &nbsp; <input style="padding:2px;" class="btn" type="submit" value="Submit" />
                          </div>

                          <br>
                          <!--bootstrap min css search for table th,.table td -->
                          <table class="table table-striped table-hover table-bordered" id="table_without_pagination">
                            <thead>
                              <tr>
                                <th style="color:#555;">Log Time</th>
                                <th style="color:#555;">Msisdn</th>
                                <th style="color:#555;">Coupon</th>
                                <th style="color:#555;">Gift</th>
                                <th style="color:#555;">Operator</th>
                                <th style="color:#555;">Circle</th>
                                <th style="color:#555;">Name</th>
                                <th style="color:#555;">Address</th>
                                <th style="color:#555;">Shipment/Tracking No</th>
                                <th style="color:#555;">Courier Partner</th>
                                <th style="color:#555;">SMS Status</th>
                                <th style="color:#555;">Send Gift Dispatch SMS</th>
                                <th style="color:#555;">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $sn_count = 1;
                              if ($result['result']) {
                                foreach ($result['result'] as $val) {
                                  ?>
                                  <tr class="">
                                    <td><?php echo date('d-m-Y H:i:s',strtotime($val['winner_time']));
                                      $sn_count++; ?></td>
                                    <td><?php echo $val['msisdn']; ?></td>
                                    <td><?php echo $val['coupon']; ?></td>
                                    <td><?php echo $val['gift_won']; ?></td>
                                    <td><?php echo $val['operator']; ?></td>
                                    <td><?php echo $val['circle']; ?></td>
                                    <td><?php echo ucwords($val['name']); ?></td>
                                    <td><?php echo ucwords($val['address']); ?></td>
                                    <td><?php echo $val['pod']; ?></td>
                                    <td><?php echo $val['courier_partner']; ?></td>
                                    <td><?php echo $val['sms_status'] >= 1 ? 'Sent' : 'Not Sent'; ?></td>
                                    <td style='text-align:center;width:20px;'>
                                        <a href="<?php echo site_url('winner_reports/send_gds/' . $val['id']); ?>">
                                            <img  src="<?php echo base_url(); ?>img/sms_ico.png" alt="Click to send" title="Click to send sms"/>
                                        </a>
                                    </td>
                                    <td style='text-align:center;width:70px;'>
                                        <a class=""  href="<?php echo site_url('winner_reports/edit_winner_details/' . $val['id']); ?>"><img src="<?php echo base_url(); ?>img/698652-icon-136-document-edit-128.png" style="width:20px;" alt="Edit" title="Edit"/></a>&nbsp;&nbsp;
                                        <a class="" target="_blank"  href="<?php echo site_url('winner_reports/print_winner_details/' . $val['id']); ?>"><img src="<?php echo base_url(); ?>img/printer.png" style="width:20px;" alt="Print" title="Print"/></a>
                                    </td>
                                    </tr>
                                    <?php }
                                  } ?>
                                </tbody>
                              </table>

                              <div style="">
                               <?php if($sn_count > 1 ) { echo $result['pagination_details'];  } ?>
                             </div>


                           </form>

                           <div style="float:right;"><?php echo $result['pagination']; ?></div>
                         </div>

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
         <?php $this->load->view('common/form_js.php'); ?>

        <script type="text/javascript">

              function download_excel(){
                 // alert();
                  $('#download_file').val('1');
                  $('#list_reports').submit();
                  $('#download_file').val('');
              } 
                
        </script>

       </body>
       <!-- END BODY -->
       </html>
