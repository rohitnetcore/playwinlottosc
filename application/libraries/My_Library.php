<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class My_Library {

    protected $CI="";

    public function __construct() {
        $this->CI =& get_instance();
    }

    function add_log(){

        $file='log/playwin_lotto_sc.log';
        
        $func_params = func_get_args();
     
        $msg = date("Y-m-d H:i:s")." ". implode('|',$func_params)."\n";
     
        file_put_contents($file,
                          $msg,
                          FILE_APPEND | LOCK_EX );
        return $msg;
    }

    public function get_circle_operator($mobile) {
        //$mobile = "8087832330";

        $data = array('msisdn' => $mobile);
        $params = http_build_query($data);
        $response = file_get_contents('http://projects.mytoday.com/handler/getCircleOperator.php?'. $params);

        $cir_op = explode('|', $response);
        return $cir_op;
    }

    public function send_sms2($feed,$mobile,$message,$time="201304191320",$jobname=null)
    {

        $url = "http://bulkpush.mytoday.com/BulkSms/SingleMsgApi?async=1&feedid=$feed&To=$mobile&Text=".urlencode($message)."&time=$time";

        if (!empty($jobname)) $url .= "&jobname=$jobname";

        $bulkpush_response = $this->call_url($url);

        $response = ((array)simplexml_load_string($bulkpush_response));
        return $response['@attributes']['REQID'];
    }


    public function call_url($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function check_isvalidated() {
        if (!$this->CI->session->userdata('validated')) {
            redirect('login');
        }
    }

    public function get_flash_messages($type='',$msg='') {
        
        if($type=='success'){
            $message = '<div class="alert alert-success">
                                    <button class="close" data-dismiss="alert">×</button>
                                    '.$msg.'
                                   </div>';
        }else if($type=='error'){
            $message = '<div class="alert alert-error">
                                    <button class="close" data-dismiss="alert">×</button>
                                    '.$msg.'
                                   </div>';
        }else{
            
        }
        $this->CI->session->set_flashdata('message', $message);
    }

    public function get_circles() {
        
        return $this->CI->db->query('SELECT DISTINCT circle from playwin_sc_log order by circle asc')->result_array();
    }

    public function pagination($url='', $function='', $where='', $sort=''){

        /*code for pagination -start*/
        $config['base_url'] = site_url() . $url;
        if(!empty($_GET)) {
            $config['suffix'] = '?'.http_build_query($_GET);
            $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        }
        
        $config['total_rows'] = $this->CI->log_reports_model->$function($where);
        
        $config['per_page'] = 50;
        $config["uri_segment"] = 3;
        // $config['num_links'] = 5;
        $config['full_tag_open'] = '<div class="row-fluid"><div class="pagination" style="float:right; margin:-40px 0px 0px 0px;"><ul>';
        $config['full_tag_close'] = '</ul></div></div>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        //$config['anchor_class'] = 'follow_link';
        $this->CI->pagination->initialize($config);
        $data['pagination'] = $this->CI->pagination->create_links();
        $page = ($this->CI->uri->segment(3)) ? $this->CI->uri->segment(3) : 0;
        $limit = 'limit ' .$config["per_page"] . ' offset ' .$page ;
        /*code for pagination -end*/
        
        $data['result'] = $this->CI->log_reports_model->$function($where, $sort, $limit);;
        
        /*code for pagination details -start*/
        $offset = $page;
        $first_record = $offset + 1;
        $last_record = $page + count($data['result']);
        $total_count = $config['total_rows'];
        $data['pagination_details'] = "<div class='span6'> <div class='dataTables_info'> Showing $first_record to $last_record of $total_count entries </div> </div>";

        /*code for pagination details -start*/

        return $data;
    }


    public function download_csv($query, $filename = 'CSV_Report.csv'){

        $this->CI->load->dbutil();
        //$this->CI->load->helper('file');
        //$this->CI->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->CI->dbutil->csv_from_result($query, $delimiter, $newline);
        force_download($filename, $data);
    }

}
?>
