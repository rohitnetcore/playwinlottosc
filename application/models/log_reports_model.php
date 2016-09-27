<?php //

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log_Reports_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    

    public function list_log_reports($where='', $sort='', $limit='') {
       
        if($sort && $limit){

            $query = $this->db->query("select * from playwin_sc_log $where $sort $limit");

        }else if($where && $sort){
            return $query = $this->db->query("select msisdn,circle,operator,original_msg,processed_msg,response_sms,log_time from playwin_sc_log $where $sort");
        }else{
            $count = $this->db->query("select count(1) from playwin_sc_log $where")->row_array();
            return $count['count'];
        }

        return $query->result_array();
    }

    public function list_winner_reports($where='', $sort='', $limit='') {
       
        if($sort && $limit){
            $query = $this->db->query("select id,msisdn,circle,operator,coupon,gift_won,name,address,pod,courier_partner,sms_status,winner_time from playwin_sc_winners where gift_won is not null $where $sort $limit");

        }else if($where && $sort){
            return $query = $this->db->query("select msisdn,circle,operator,coupon,gift_won,name,address,pod,courier_partner,sms_status, winner_time as log_time  from playwin_sc_winners where gift_won is not null $where $sort");
        }else{
            $count = $this->db->query("select count(1) from playwin_sc_winners where gift_won is not null $where")->row_array();
            return $count['count'];
        }
        return $query->result_array();
    }

    public function alert_log_reports($where='', $sort='', $limit='') {
       
        if($sort && $limit){
            $query = $this->db->query("select * from playwin_sc_log $where $sort $limit");

        }else if($where && $sort){
            return $query = $this->db->query("select msisdn,circle,operator,processed_msg,original_msg,response_sms,log_time from playwin_sc_log $where $sort");
        }else{
            $count = $this->db->query("select count(1) from playwin_sc_log $where")->row_array();
            return $count['count'];
        }

        return $query->result_array();
    }

}
?>
