<?php
class Login_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function loginvalidate($username,$password) {
        $where = array('username' => $username, 'password' => $password);
        $query = $this->db->get_where('adminusers',$where);
        //echo $this->db->last_query();exit;
        if($query->num_rows() == 1){
            $row = $query->row();

            $data = array(
                'user_id' => $row->id,
                'name' => $row->name,
                'email' => $row->email,
                'user_type' => $row->user_type,
                'validated' => true
            );

            if( $row->status == 'f'){
                return 2;
            }else{
                $set_session = $this->session->set_userdata($data);
                return true;
            }
        }
        return false;
    }
    public function emailvalidate($email) {

        $query = $this->db->query("select * from adminusers where email='".$email."' and status='1'");
        //echo $this->db->last_query();
        if ($query->num_rows == 1) {
            $row = $query->row();
            $pass = $row->password;
            $password = $this->encryptdecrypt->decrypt($pass);
            $arrpwd = 1;
            $this->send_password($password, $email);
        } else {
             $arrpwd = 0;
        }
        //echo $arrpwd;exit;
        return $arrpwd;
    }

    function send_password($password, $email) {
//        $config = Array(
//            'protocol' => 'smtp',
//            'smtp_host' => 'ssl://smtp.googlemail.com',
//            'smtp_port' => 465,
//            'smtp_user' => 'rohitsonawane.genie@gmail.com',
//            'smtp_pass' => 'Genietechnology123',
//            'mailtype'  => 'html', 
//            'charset'   => 'iso-8859-1'
//        );
//        $this->load->library('email',$config);
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from('rohitsonawane.genie@gmail.com', 'Rohit Sonawane');
        $this->email->to($email);
        $this->email->subject(' Your Password on Vadfest ');
        $text_body = "Your Password For Vadfest is :$password";
        $this->email->message($text_body);

        if ($this->email->send()) {
            //redirect('/login/resetLinkSuccess');
        } else {
            echo $this->email->print_debugger();
        }
    }
}
?>
