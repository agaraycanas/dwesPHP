<?php
class Info extends CI_Controller {
    
    public function mensaje() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if (isset($_SESSION['_mensaje'])) {
        
            $data['mensaje']    =   $_SESSION['_mensaje'];
            $data['link']       =   $_SESSION['_link'];
            $data['severidad']  =   $_SESSION['_severidad'];
            
            session_destroy();
        }
        else {
            $data['mensaje']    =   'Pulsa un botón para volver';
            $data['link']       =   '';
            $data['severidad']  =   'success';
        }
        
        frame($this,'_t/info',$data);
    }
    
    public function index() {
        $this->mensaje();
    }
}
?>