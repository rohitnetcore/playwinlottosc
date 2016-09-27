<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Login extends CI_Controller {
    
       function __construct() {
        parent::__construct(); 
    }
    
      public function index($msg = NULL) {
        if ($this->session->userdata('validated')) {
            redirect('admin');
        }
        $data['msg'] = $msg;
        $this->load->view('login/login',$data);
     }
    
     public function enquiry($msg = NULL) {
         $data['msg'] = $msg;
         $this->load->view('login/login', $data);
     }
   
      public function processlogin() {
       //$session_type = $this->input->post('session_type');
       $username = stripslashes($this->input->post('username'));
       $password = strip_slashes($this->input->post('password'));
       $username = $username;
       $password = $password;
       $enc_password = $this->encryptdecrypt->crypt($password);
       $remember = $this->input->post('remember');
       $result = $this->login_model->loginvalidate($username,$enc_password);
      
       if(!$result){
           $msg = 'Invalid username and/or password.';
           $this->index($msg);
       }elseif($result === 2){
           $msg = 'Your account is deactivated.';
           $this->index($msg);
       }else{
           if ($remember == 1) {
                setcookie('username', $username, time() + 60 * 60 * 24 * 100, "/");
                setcookie('password', $password, time() + 60 * 60 * 24 * 100, "/");
                setcookie('remember_me', $remember, time() + 60 * 60 * 24 * 100, "/");
            } else {
                setcookie('username', 'gone', time() - 60 * 60 * 24 * 100, "/");
                setcookie('password', 'gone', time() - 60 * 60 * 24 * 100, "/");
                setcookie('remember_me', 'gone', time() - 60 * 60 * 24 * 100, "/");
            }
            redirect('admin');
       }
    }
    
    public function forget_password(){
        $data['msg'] = $this->input->get('msg');
        $data['err'] = $this->input->get('err');
        $this->load->view('login/login/forget_password',$data);
    }
    
    public function forgotpwd() {
        $email = $this->input->post('email');
        $success = $this->login_model->emailvalidate($email);
        if($success){
            $msg = 'Please check your mail for further proceedings!';
            redirect("login/forget_password?msg=$msg");
        }else{
            $err = 'Invalid Email id!';
            redirect("login/forget_password?err=$err");
        }
    }
    
    public function do_logout() {
        $array_items = array('user_id' => '', 'name' => '', 'email' => '', 'user_type' => '', 'validated' => FALSE);
        $this->session->unset_userdata($array_items);
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        if($type == 'Enquiry'){
            redirect('login/enquiry');
        } else { 
            redirect('login');
        }
    }
}
?>
