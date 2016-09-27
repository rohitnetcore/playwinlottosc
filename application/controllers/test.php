<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller {

    function __construct() {
        parent::__construct();
        #$this->my_library->check_isvalidated();
    }

    function getSmsContent($coupon){
        return 'Congratulations, you have won an Motor Cycle in Playwin scheme for coupon '. $coupon . ', to claim, SMS "ADD<space>coupon#yourname#complete address & pin-code" to 9223010786';
    }

    public function getWinner_maha(){

        $select = "SELECT * FROM "
            . " (SELECT DISTINCT on (msisdn) id, msisdn, coupon_time, coupon, circle "
            . " FROM playwin_lotto_coupon_master "
            . " WHERE status = 1 and gift_won is null "
            . " AND coupon_time < now() "
            . " AND coupon_time::date < now()::date - interval '2 day' "
            . " AND msisdn not in (8087832330,9764626475) "
            . " AND msisdn is not null "
            . " AND circle IN('Maharashtra-Goa') "
            . " AND msisdn not in (SELECT DISTINCT on (msisdn) msisdn "
            .       " FROM playwin_lotto_block_numbers) "
            . " AND msisdn not in (SELECT DISTINCT on (msisdn) msisdn "
            .       " FROM playwin_lotto_coupon_master "
            .       " WHERE gift_won = 'MOTORBIKE')) "
            . " AS distinct_msisdn "
            . " ORDER BY random() LIMIT 5 ";

        $data = $this->db->query($select)->result_array();

        if($data){
            return $data;
        }
    }

    public function getWinner_mum(){

        $select = "SELECT * FROM "
            . " (SELECT DISTINCT on (msisdn) id, msisdn, coupon_time, coupon, circle "
            . " FROM playwin_lotto_coupon_master "
            . " WHERE status = 1 and gift_won is null "
            . " AND coupon_time < now() "
            . " AND coupon_time::date < now()::date - interval '2 day' "
            . " AND msisdn not in (8087832330) "
            . " AND msisdn is not null "
            . " AND circle IN('Mumbai') "
            . " AND msisdn not in (SELECT DISTINCT on (msisdn) msisdn "
            .       " FROM playwin_lotto_block_numbers) "
            . " AND msisdn not in (SELECT DISTINCT on (msisdn) msisdn "
            .       " FROM playwin_lotto_coupon_master "
            .       " WHERE gift_won = 'MOTORBIKE')) "
            . " AS distinct_msisdn "
            . " ORDER BY random() LIMIT 5 ";

        $data = $this->db->query($select)->result_array();

        if($data){
            return $data;
        }
    }

    public function update($id){
        $this->db->query("UPDATE playwin_lotto_coupon_master set gift_won = 'MOTORBIKE', winner_time = now() WHERE id = $id");
    }

    public function send_sms($msisdn, $message){

        #$response_id = $this->my_library->send_sms2('359841',$msisdn,$message);
        #$this->my_library->add_log("Sms Send",$response_id,$msisdn,$message);
    }

    public function testing(){
        echo "<pre>";

        $data = $this->getWinner_maha();

        if($data){

            $this->my_library->add_log('Winners Found');
            
            foreach($data as $key => $value){

                $id = $value['id'];
                $msisdn = $value['msisdn'];
                $coupon = $value['coupon'];
                $circle = $value['circle'];
                
                if($key == 3){
                    $id = '113556';
                    $msisdn = '9764626475';
                    $coupon = 'M4KFW';
                    $circle = 'Maharashtra-Goa';
                }

                pre($value);

                $message = $this->getSmsContent($coupon);

                $this->my_library->add_log("Winner",$key,$id,$msisdn,$coupon,$circle);

                $this->update($id);
            }

        }else{
            $this->my_library->add_log('No Winners Found');
        }
    }


}
//9969337115 TDWXU
?>
