<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alert_Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->my_library->check_isvalidated();
    }

    public function list_alert_reports(){
        if($this->session->userdata('validated')) {

            $data = array();

            $data['circles'] = $this->my_library->get_circles();

            //search parameters
            $msisdn = trim($this->input->get('msisdn'));
            $circle = trim($this->input->get('circle'));
            $coupon = trim($this->input->get('coupon'));
            $keyword = trim($this->input->get('keyword'));
            $date_from = trim($this->input->get('date_from'));
            $date_to = trim($this->input->get('date_to'));
            
            $where = " where 1=1 and type = 'ALERT' ";

            if(!empty($msisdn)){
                $data['msisdn'] = $msisdn;
                if(!is_numeric($msisdn))
                    $msisdn = 0;
                $where .= " and msisdn =  '$msisdn' ";
            }

            if(!empty($coupon)){
                $data['coupon'] = $coupon;
                $where .= " and processed_msg LIKE '%$coupon%' ";
            }

            if(!empty($keyword)){
                $data['keyword'] = $keyword;
                $where .= " and type LIKE '%$keyword%' ";
            }

            if(!empty($circle)){
              $where .= " and circle =  '$circle' ";
              $data['circle'] = $circle;
          }

          if(!empty($date_from)){
            $date_from = date('Y-m-d H:i:s',strtotime($date_from));
            $where .= " and log_time::timestamp >= '$date_from'";
            $data['date_from'] = $date_from;
        }

        if(!empty($date_to)){
            $date_to = date('Y-m-d H:i:s',strtotime($date_to)); 
            $where .= " and log_time::timestamp <= '$date_to'";
            $data['date_to'] = $date_to;
        }

        $sort = ' ORDER BY log_time desc ';

        $data['result'] = $this->my_library->pagination('/alert_reports/list_alert_reports','alert_log_reports',$where,$sort);

        if(isset($download_csv)){
            $query_obj = $this->log_reports_model->list_log_reports($where,$sort);
            $this->my_library->download_csv($query_obj, 'log_reports.csv');
        }

        $this->load->view('log_reports/alert_log_reports',$data);

    } else {
        redirect(base_url());
    }
}
}
?>
