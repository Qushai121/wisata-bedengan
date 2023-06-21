<?php 

function userLogin(){
    if(session('user_id')){

        $db = \Config\Database::connect();
        return $db->table('user')->where('user_id',session('user_id'))->get()->getRowArray();
    }
}

?>