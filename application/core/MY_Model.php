<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{

    protected $TABLE;
    
    public function __construct(){
        parent::__construct();
    }
    
    function get($whatID,$id,$exactOne=true,$exactField='',$sortID='',$sortType=''){
        $this->db->select('*');
        $this->db->where($whatID,$id);
        if( $sortID !== '' ){
            $this->db->order_by($sortID,$sortType);
        }
        if( $exactOne ){
            $result = $this->db->get($this->TABLE)->result();
            if( count($result) < 1 ){ return -1; }
            else { 
                if( $exactField !== '' ){ return current($result)->$exactField; }
                else{ return current($result); } 
            }
        }
        else
        {
            return $this->db->get($this->TABLE)->result();
        }
    }
    
    function getAll($whatID,$id,$sortID='',$sortType=''){
        return $this->get($whatID,$id,false,'',$sortID,$sortType);
    }
    
    function getAllTable($sortID='',$sortType=''){
        $this->db->select('*');
        if ($sortID !== '') {
            $this->db->order_by($sortID, $sortType);
        }
        return $this->db->get($this->TABLE)->result();
    }

    function set($whatID,$id,$valID,$val){
        $this->db->where($whatID,$id);
        $this->db->update($this->TABLE, array($valID=>$val));
    }
    
    function add($vals){
        $this->db->insert($this->TABLE, $vals);
    }
    
    function remove($whatID,$id){
        $this->db->where($whatID, $id);
        $this->db->delete($this->TABLE);
    }
            
    protected function makeUniqueName($baseName){
        $uid = $this->session->userdata('uid');
        $dt = date('l jS \of F Y h:i:s A');
        return md5($baseName.$dt.$uid);
    }
    
//    protected function printError($errorText){
//        $dataHeader['title'] = 'BŁĄD!!!';
//        $dataContent['errorText'] = $errorText;
//        $this->load->view('panel/header2',$dataHeader);
//        $this->load->view('panel/error',$dataContent);
//        $this->load->view('panel/footer2');
//    }
    
}
?>
