<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->my_library->check_isvalidated();
    }
    
    public function index() {
        if ($this->session->userdata('validated')) {
            $this->load->view('dashboard');
        } else {
            redirect(base_url());
        }
    }
    
    public function show_user_profile() {
        if ($this->session->userdata('validated')) {
            $user_id = $this->session->userdata('user_id');
            $data['msg'] = $this->input->get('msg');
            $data['err'] = $this->input->get('err');
            $data['result'] = $this->admin_model->get_user_details($user_id);
            if ($data != "") {
                $this->load->view('admin/my_profile', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    public function edit_user_profile($user_id=NULL) {
        if ($this->session->userdata('validated')) {
            $user_id = $this->session->userdata('user_id');
            $data['result'] = $this->admin_model->get_user_details($user_id);
            if($data != "") {
                $this->load->view('admin/edit_user', $data);
            }
        } else {
            redirect(base_url());
        }
    }
    
    public function update_user_profile() {
        if ($this->session->userdata('validated')) {
            $user_id = $this->session->userdata('user_id');
            $this->validate_user_form();
            if ($this->form_validation->run() == FALSE){
                $this->edit_user_profile();
            }else{
                $data = array(
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'mobile_no' => $_POST['mobile_no']
                );
                $success = $this->admin_model->update_user($data,$user_id);
                $this->session->set_flashdata('success', 'User details updated successfully.');
                redirect("admin/show_user_profile");
            }
        } else {
            redirect(base_url());
        }
    }
    
    public function change_password() {
        if ($this->session->userdata('validated')) {

            $data['msg'] = $this->input->get('msg');
            $data['err'] = $this->input->get('err');

            $this->load->view('admin/change_password',$data);

        } else {
            redirect(base_url());
        }
    }
    
    public function update_password() {
        if ($this->session->userdata('validated')) {

            $user_id = $this->session->userdata('user_id');
            $user_data = $this->admin_model->get_user_details($user_id);
            $old_pwd = $this->input->post('old_password');
            $new_pwd = $this->input->post('new_password');
            $chk_pwd = $this->input->post('confirm_password');
            $err='';
            if ($old_pwd != $user_data['password']) {
                $err = "Old password does not match.";
            }else if($new_pwd != $chk_pwd) {
                $err = "New and confirm password not matching.";
            }
            if($err){
                $this->session->set_flashdata('error', $err);
                redirect("admin/change_password");
            }else{
                $enc_new_pwd = $this->encryptdecrypt->crypt($new_pwd);
                $this->admin_model->update_password($enc_new_pwd, $user_id);
                $this->session->set_flashdata('success', 'Password updated successfully.');
                redirect("admin/change_password");
            }
        } else {
            redirect(base_url());
        }
    }

    function file_extension($path) {
        $extension = substr(strrchr($path, '.'), 1);
        return $extension;
    }
    
    public function manage_staff_user(){
        if($this->session->userdata('validated')) {
            $data['msg'] = $this->input->get('msg');
            $data['err'] = $this->input->get('err');
            $data['result'] = $this->admin_model->manage_staff_users();

            $this->load->view('admin/list_staff_users',$data);
            
        } else {
            redirect(base_url());
        }
    }

    public function add_staff_user(){
        if($this->session->userdata('validated')) {
            $data['msg'] = $this->input->get('msg');
            $data['err'] = $this->input->get('err');

            $this->load->view('admin/add_staff_user',$data);

        } else {
            redirect(base_url());
        }
    }
    
    public function check_email (){
        $email = trim(strtolower($this->input->post('email')));
        $this->admin_model->check_email($email);
    }
    
    public function check_username (){
            //echo $_REQUEST['username'];exit;
            $this->admin_model->check_username($this->input->post('username'));
    }
    
    public function insert_staff_user(){
        if($this->session->userdata('validated')) {
            $this->validate_staff_form();
            if ($this->form_validation->run() == FALSE){
                $this->add_staff_user();
            }else{
                //print_r($_POST);EXIT;
                $created_date = date('Y-m-d');
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->encryptdecrypt->crypt($this->input->post('password')),
                    'name' => $this->input->post('staff_name'),
                    'email' => $this->input->post('email'),
                    'mobile_no' => $this->input->post('phone_no'),
                    'user_type' => 'staff',
                    'status' => '1',
                    'create_date' => $created_date,
                    'campaign_name' => 'playwin_keno'
                );
                $sucess = $this->admin_model->insert_staff_user($data);
                if($sucess){
                    $this->session->set_flashdata('success', 'Staff user added successfully.');
                    redirect("admin/manage_staff_user");
                }
            }
        } else {
            redirect(base_url());
        }
    }
    
    public function edit_staff_user($id = NULL){
        if($this->session->userdata('validated')) {
            $staff_id = $this->input->get('staff_id');
            if(!$staff_id){
                $staff_id = $id;
            }
            $data['result'] = $this->admin_model->get_user_details($staff_id);

            $this->load->view('admin/edit_staff_user',$data);

        } else {
            redirect(base_url());
        }
    }
    
    public function update_staff_user() {
        if($this->session->userdata('validated')) {
            $staff_id = $this->input->post('staff_id');
            $data = array(
                    'password' => $this->encryptdecrypt->crypt($this->input->post('password')),
                    'name' => $this->input->post('staff_name'),
                    'mobile_no' => $this->input->post('phone_no')
                );
                $sucess = $this->admin_model->update_staff_user($data,$staff_id);
                $this->session->set_flashdata('success', 'Staff user details updated successfully.');
                redirect("admin/manage_staff_user");
        } else {
            redirect(base_url());
        }
    }
    
    public function delete_staff_user() {
        if ($this->session->userdata('validated')) {
            $staff_id = $this->input->get('staff_id');
            $this->admin_model->delete_staff_user($staff_id);
            $this->session->set_flashdata('success', 'Staff user deleted successfully.');
            redirect("admin/manage_staff_user");
        } else {
            redirect(base_url());
        }
    }
    
    public function validate_mobile_no($mobile_no){ 
        $this->form_validation->set_message('validate_mobile_no','Mobile Number Should Start with 7,8 or 9.');
        if($mobile_no){
            if(!preg_match('/^(9|8|7)\d{9}$/',$mobile_no)){
                return FALSE;
            }else{
                return TRUE;
            }
        }
    }
    
    public function validate_user_form(){
        $config = array(
               array(
                     'field'   => 'name',
                     'label'   => 'Name',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'required|valid_email'
                  ),
              array(
                     'field'   => 'mobile_no',
                     'label'   => 'Mobile No',
                     'rules'   => 'required|max_length[10]|is_natural'
                  )
            
            );
        $this->form_validation->set_rules($config);
    }
    
    public function validate_staff_form(){
        $this->form_validation->set_message('is_unique','Already exists.');
        $config = array(
               array(
                     'field'   => 'staff_name',
                     'label'   => 'Name',
                     'rules'   => 'required'
                  ),
              array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'required|min_length[4]|is_unique[adminusers.username]'
                  ),
              array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'required|min_length[4]'
                  ),
              array(
                     'field'   => 'confirm_password',
                     'label'   => 'Confirm Password',
                     'rules'   => 'required|matches[password]'
                  ),
              array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'required|email|is_unique[adminusers.email]'
                  ),
              array(
                     'field'   => 'phone_no',
                     'label'   => 'Phone No',
                     'rules'   => 'required|max_length[10]|is_natural'
                  )
            
            );
        $this->form_validation->set_rules($config);
    }

    public function check_user_email (){
        $email = trim(strtolower($this->input->post('email')));
        $this->admin_model->check_user_email($email);
    }

    public function update_user_status() {
        if ($this->session->userdata('validated')) {
            $userid = $this->input->get('userid');
            $status = $this->input->get('status');
            $userdata = array(
                'status' => $status
            );
            $this->admin_model->update_user($userdata, $userid);
            if ($status == 't') {
                $msg = 'User activated successfully.';
            } else {
                $msg = 'User deactivated successfully.';
            }
            $this->session->set_flashdata('success', $msg);
            redirect('admin/manage_staff_user');
        } else {
            redirect('login');
        }
    }
 
}
?>
