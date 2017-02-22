<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dsy_controller extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('export_excel');
    }
    public function index(){
        $this->load->view('monthly_uf');
    }
    
    public function get_uf(){
        //http://api.sbif.cl/api-sbifv3/recursos_api/uf/2010/01/dias/01?apikey=d8093171162117c0c6e8da895b00978d4e2b6a0e&formato=json
        $date=explode('-',$this->input->post('date'));
        $json = json_decode(file_get_contents("http://api.sbif.cl/api-sbifv3/recursos_api/uf/".$date[0]."/".$date[1]."/dias/".$date[2]."?apikey=d8093171162117c0c6e8da895b00978d4e2b6a0e&formato=json"),true);
        echo json_encode($json);
    }
    
    public function save_file(){
        $date=explode('-',$this->input->post('date'));
        $json = json_decode(file_get_contents("http://api.sbif.cl/api-sbifv3/recursos_api/uf/".$date[0]."/".$date[1]."/dias/".$date[2]."?apikey=d8093171162117c0c6e8da895b00978d4e2b6a0e&formato=json"),true);
        $objWriter->save('php://output');
        $this->export_excel->to_excel($json,'lista_uf');
    }
}

?>