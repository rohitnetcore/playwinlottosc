<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function uploadAgencyData(){

        $datetime = date('Y-m-d H:i:s');
        $transid = rand(111111111111,999999999999);

        if ( !empty( $_FILES ) ) {

            $this->my_library->add_log(" ------ Upload Agency Data ------ ");
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileName = str_replace( ' ', '_', $fileName );
            $targetFile = CSV_UPLOAD_PATH . $fileName ;

            $this->my_library->add_log("Uploading file, Filename = $fileName, TransId => $transid");

            $info = new SplFileInfo($fileName);
            $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
            $name = pathinfo($info->getFilename(), PATHINFO_FILENAME);

            if( strtolower($extension) == 'csv' ){

                $done = move_uploaded_file( $tempFile, $targetFile );

                if($done){

                    $fileObj = fopen(CSV_UPLOAD_PATH.$fileName,"r");
                    $data = array();

                    $i=0;$valid=0;$invalid=0;

                    while($row = fgetcsv($fileObj)){
                        
                        $coupon = trim($row[2]);
                        $storecode = trim($row[1]);

                        if( $coupon && $storecode && strlen($coupon) == 5  ) {
                            $exists = $this->db->get_where('playwin_lotto_coupon_master', array('coupon'=>$coupon))->row();
                            if($exists){
                                $data = array('storecode'=>$storecode);
                                $this->db->where('coupon', $coupon);
                                $this->db->update('playwin_lotto_coupon_master',$data);
                                $valid++;
                            }else{
                                $invalid++;
                            }
                        }else{
                            $invalid++;
                        }
                        $i++;
                    }
                    fclose($fileObj);

                    $this->my_library->add_log("File uploaded successfully, Filename = $fileName, TransId => $transid");
                    echo json_encode(array('status'=>'success','message'=>'File uploaded successfully!','TransId'=>$transid, 'Total' => $i, 'Valid' => $valid, 'Invalid' => $invalid ));
                }else{
                    $this->my_library->add_log("Error in uploading file, Filename = $fileName, TransId => $transid" );
                    echo json_encode(array('status'=>'fail','message'=>'Error in uploading file!','TransId'=>$transid));
                }
            }else{
                $this->my_library->add_log("Invaid file, Not a csv file, Filename = $fileName, TransId => $transid");
                echo json_encode(array('status'=>'fail','message'=>'Invalid file!','TransId'=>$transid));
            }
        }else{

            $this->my_library->add_log("No file to upload, TransId => $transid");
            echo json_encode(array('status'=>'fail','message'=>'No file to upload!','TransId'=>$transid));
        }

    }
}
?>
