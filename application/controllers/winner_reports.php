<?php
ini_set('error_reporting', E_ALL);
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class winner_Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->my_library->check_isvalidated();
    }

    public function list_winner_reports(){

        if($this->session->userdata('validated')) {

            $data = array();

            $data['circles'] = $this->my_library->get_circles();

            //search parameters
            $msisdn = trim($this->input->get('msisdn'));
            $circle = trim($this->input->get('circle'));
            $name = trim($this->input->get('name'));
            $gift_won = trim($this->input->get('gift_won'));
            $sms_status = trim($this->input->get('sms_status'));
            $pod = trim($this->input->get('pod'));
            $date_from = trim($this->input->get('date_from'));
            $date_to = trim($this->input->get('date_to'));
            $download_csv = trim($this->input->get('download_file'));

            $where = ' ';

            if(!empty($msisdn)){
                $data['msisdn'] = $msisdn;
                if(!is_numeric($msisdn))
                    $msisdn = 0;
                $where .= " and msisdn =  '$msisdn' ";
            }

            if(!empty($name)){
                $data['name'] = $name;
                $where .= " and name LIKE  '%$name%' ";
            }

            if(!empty($gift_won)){
                $data['gift_won'] = $gift_won;
                $where .= " and gift_won LIKE  '%$gift_won%' ";
            }

            if($sms_status != ''){
                $data['sms_status'] = $sms_status;
                if($sms_status >= 1){
                    $where .= " and sms_status >= 1 ";
                }else{
                    $where .= " and sms_status = 0 ";
                }
            }

            if(!empty($pod)){
                $data['pod'] = $pod;
                $where .= " and pod LIKE  '%$pod%' ";
            }

            if(!empty($circle)){
              $where .= " and circle =  '$circle' ";
              $data['circle'] = $circle;
            }

            if(!empty($date_from)){
                $date_from = date('Y-m-d H:i:s',strtotime($date_from));
                $where .= " and winner_time::timestamp >= '$date_from'";
                $data['date_from'] = $date_from;
            }

            if(!empty($date_to)){
                $date_to = date('Y-m-d H:i:s',strtotime($date_to)); 
                $where .= " and winner_time::timestamp <= '$date_to'";
                $data['date_to'] = $date_to;
            }

            $sort = ' ORDER BY winner_time desc ';


            //echo $where;exit;

            $data['result'] = $this->my_library->pagination('/winner_reports/list_winner_reports','list_winner_reports',$where,$sort);

            if($download_csv==1){
                $query_obj = $this->log_reports_model->list_winner_reports($where,$sort);
                $this->my_library->download_csv($query_obj, 'log_winner_reports.csv');
            }

            $this->load->view('winner_reports/list_winner_reports',$data);

        } else {
            redirect(base_url());
        }
    }

    public function edit_winner_details($id){
        if($this->session->userdata('validated')) {
            if($id){

                $data['result'] = $this->db->get_where('playwin_sc_winners',array('id'=>$id))->row_array();

                if($data['result']){
                    $this->load->view('winner_reports/edit_winner_details',$data);    
                }
            }   
        } else {
            redirect(base_url());
        }
    }

    public function update_winner_details(){
        if($this->session->userdata('validated')) {

            $id = $this->input->post('id');

            $this->validate_winner_form();
            if ($this->form_validation->run() == FALSE){
                $this->edit_winner_details($id);
            }else{
                
                $data = array(
                    'pod' => $this->input->post('pod'),
                    'courier_partner' => $this->input->post('courier_partner'),
                    'address' => $this->input->post('address')
                );

                $this->db->where('id', $id);
                $this->db->update('playwin_sc_winners',$data);

                $this->my_library->get_flash_messages('success','Details updated successfully');
                
                redirect('winner_reports/list_winner_reports');
            }    

        } else {
            redirect(base_url());
        }
    }

    public function validate_winner_form(){
       
        $config = array(
               array(
                     'field'   => 'pod',
                     'label'   => 'Shipment/Tracking No',
                     'rules'   => 'required'
                  ),
              array(
                     'field'   => 'courier_partner',
                     'label'   => 'Courier Partner Name',
                     'rules'   => 'required'
                  ),
              array(
                     'field'   => 'address',
                     'label'   => 'Address',
                     'rules'   => 'required'
                  )
            
            );
        $this->form_validation->set_rules($config);
    }

    public function send_gds($id){
        if($this->session->userdata('validated')) {

            $data = $this->db->get_where('playwin_sc_winners', array('id'=>$id) )->row_array();

            if($data['sms_status'] < 2){

                $msisdn = $data['msisdn'];
                $name = trim($data['name']);
                $address = trim($data['address']);
                $courier_partner = trim($data['courier_partner']);
                $pod = trim($data['pod']);

                $sms_status = $data['sms_status'] + 1;
                
                if($courier_partner && $pod && $address){

                    $sms_response = 'Dear Playwin Sona Chandi scheme winner we have couriered your Gift through courier '.$courier_partner.' & POD no of the same is '.$pod.'. You will receive your gift in next 10 days';

                    $req_id = $this->my_library->send_sms2(PLAYWIN_FEEDID, $msisdn, $sms_response);

                    $success = $this->db->where('id', $id)->update('playwin_sc_winners', array('sms_status'=>$sms_status,'request_id'=>$req_id ) );
                 
                    $this->my_library->get_flash_messages('success','Sms Sent successfully');

                }else{
                    $this->my_library->get_flash_messages('error','Cant send sms. No details about address or pod or courier partner name');
                }
            }else{
                $this->my_library->get_flash_messages('error','You have already sent sms to this user');
            }
            
            redirect('winner_reports/list_winner_reports');

        } else {
            redirect(base_url());
        }
    }

    public function print_winner_details($id){
        if($this->session->userdata('validated')) {
            if($id){

                $data['result'] = $this->db->get_where('playwin_sc_winners',array('id'=>$id))->row_array();

                if($data['result']){
                    $this->load->view('winner_reports/print_winner_details',$data);    
                }
            }   
        } else {
            redirect(base_url());
        }
    }

}
?>
