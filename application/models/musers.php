<?php 

class MUsers extends CI_Model {

    function get_all(){
        $this->db->select('*');
        return $this->db->get('users')->result();
    }

    function get_admins(){
        $this->db->select('*');
        $this->db->where('is_admin','1');
        return $this->db->get('users')->result();
    }

    function get_normals(){
        $this->db->select('*');
        $this->db->where('is_admin','0');
        return $this->db->get('users')->result();
    }

    function get_all_users() {
        $this->db->select('id,login,pwd,email,is_admin');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }
    function get_user($uid) {
        $this->db->select('id,login,pwd,email,is_admin');
        $this->db->where('id',$uid);
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

    function get($uid) {
        $this->db->select('*');
        $this->db->where('id',$uid);
        return current($this->db->get('users')->result());
    }

    //getPermissions($userID))

    // Authenticate a user login
    public function authenticate_user($username, $password, &$uid, &$is_admin) {
        $this->db->select('id, is_admin');
        $this->db->where('login', $username);
        $this->db->where('pwd', md5($password) );
        $this->db->from('users');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $uid = $row->id;
            $is_admin = $row->is_admin;
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // Check if username exists
    public function username_exists($username) {
        $this->db->where('login', $username);
        $this->db->from('users');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function add_user($username) {
        if ( $this->username_exists($username) ) return 'ae';
        $this->db->insert('users', array('login'=>$username, 'pwd'=>md5(''), 'is_admin'=>0, 'email'=>''));
        return '';
    }
    public function add_admin($username) {
        if ( $this->username_exists($username) ) return 'ae';
        $this->db->insert('users', array('login'=>$username, 'pwd'=>md5(''), 'is_admin'=>1, 'email'=>''));
        return '';
    }
    function del_user($id){
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    /*
    if ( $_POST['val'] ){
            $this->MUser->add_perm( $_POST['userid'], $_POST['which'] );
        }
        else{
            $this->MUser->del_perm( $_POST['userid'], $_POST['which'] );
      */
    
    function add_perm( $userID, $which ){
        $this->db->select('permissions');
        $this->db->where('id',$userID);
        $perm = $this->db->get('users')->result();
        $rperm = explode(',',$perm[0]->permissions);

        array_push($rperm, $which);

        $psx = implode(',',$rperm);

        $this->db->where('id',$userID);
        $this->db->update('users', array('permissions'=>$psx));
    }

    function del_perm( $userID, $which ){
        $this->db->select('permissions');
        $this->db->where('id',$userID);
        $perm = $this->db->get('users')->result();
        $rperm = explode(',',$perm[0]->permissions);

        $psx2 = array();
        foreach( $rperm as $p){
            if ( $p != $which )$psx2[] = $p;
        }

        $psx = implode(',',$psx2);

        $this->db->where('id',$userID);
        $this->db->update('users', array('permissions'=>$psx));
    }



    function get_permissions($userID){
        $this->db->select('permissions');
        $this->db->where('id',$userID);
        //return $this->db->get('users')->result();
        $perm = $this->db->get('users')->result();

        $rperm = explode(',',$perm[0]->permissions);

        $this->load->model('MCategories','MCategories',TRUE);
        $cts = $this->MCategories->getToMenu2('pl');

        $retArr = array();
        foreach ( $cts as $c ){
            //$retArr[$c->name] = $c;

            $rv = array_search($c->name,$rperm);
            //    $retArr[$c->name] = $rv;

            if ( $rv === false)
            {
                $c->havePermission = false;
                $retArr[$c->name] = $c;
            }else{
                $c->havePermission = true;
                $retArr[$c->name] = $c;
            }
        }
        return $retArr;
    }
    
    function change_user($uid, $what, $val){
        if ( $what == 'pwd' ) $val = md5($val);
        $this->db->where('id',$uid);
        $this->db->update('users', array($what=>$val) );
    }
//    // Create user record in database
//    public function add_user($username, $password, &$uid, &$is_admin) {
//        $this->db->insert('user', array('username'=>$username, 'password'=>md5($password)));
//
//        $this->db->select('id');
//        $this->db->where('username', $username);
//        $this->db->from('user');
//        $query = $this->db->get();
//        $row = $query->row();
//        $uid = $row->id;
//
//        $is_admin = FALSE;
//    }

}

/* End of file muser.php */
/* Location: ./system/application/models/muser.php */
