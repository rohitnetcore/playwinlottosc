<?php //

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function check_user_email($email){
        $query = $this->db->query("SELECT * FROM users WHERE email='$email'");
        if ($query->num_rows() >= 1) {
            echo 'false';
        } else {
            echo 'true';
        }
        exit;
    }

    public function manage_users($limit = NULL, $sort = NULL) {
        $query = $this->db->query("SELECT * from users $sort $limit");
        //echo $this->db->last_query();exit;
        return $query->result_array();
    }

    
    /* Default functions -start */
    public function get_user_details($id){
        $query = $this->db->get_where('adminusers', array('id' => $id));
        $row = $query->row();
        $password = $this->encryptdecrypt->decrypt($row->password);
        $data = array(
            'user_id' => $row->id,
            'username' => $row->username,
            'password' => $password,
            'name' => $row->name,
            'email' => $row->email,
            'mobile_no' => $row->mobile_no,
            'user_type' => $row->user_type
        );
        return $data;
    }
    
    public function update_user($data,$id){
        $query = $this->db->where('id', $id);
        $query = $this->db->update('adminusers',$data);
        //$this->db->last_query();
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function update_user_master($data,$id){
        $query = $this->db->where('id', $id);
        $query = $this->db->update('future_generali_ivr_log',$data);
        //$this->db->last_query();
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function update_password($new_pwd, $user_id) {
        $data = array(
            'password' => $new_pwd
        );
        
        //print_r($data);exit;
        $this->db->where('id', $user_id);
        $this->db->update('adminusers', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function manage_staff_users(){
        $query = $this->db->query("SELECT * FROM adminusers WHERE user_type = 'staff' and campaign_name='playwin_keno'");
        return $query->result_array();
    }
    
    public function list_circles(){
        $query = $this->db->query("SELECT id,name FROM series_circles");
        return $query->result_array();
    }
    
    public function list_user_master(){
        $query = $this->db->query("SELECT * FROM future_generali_ivr_log where request_id is null order by id desc");
        return $query->result_array();
    }

    public function check_email($email){
        $query = $this->db->query("SELECT * FROM adminusers WHERE email='$email'");
        if ($query->num_rows() >= 1) {
            echo 'false';
        } else {
            echo 'true';
        }
        exit;
    } 
    
    public function check_username($username){
        $query = $this->db->query("SELECT * FROM adminusers WHERE username='$username'");
        if ($query->num_rows() >= 1) {
            echo 'false';
        } else {
            echo 'true';
        }
        exit;
    } 
    
    public function insert_staff_user($data){
        
        $query = $this->db->insert('adminusers',$data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
    
    public function update_staff_user($data,$id){
        $query = $this->db->where('id', $id);
        $query = $this->db->update('adminusers',$data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
    public function delete_staff_user($id){
        //$query = $this->db->query("update vadfest_call_center_admin set status='0' where id='$id'");
        $this->db->delete('adminusers', array('id' => $id));
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    
 
    public function add_user_master($data) {
        $res = $this->db->insert('future_generali_ivr_log', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
}
?>
