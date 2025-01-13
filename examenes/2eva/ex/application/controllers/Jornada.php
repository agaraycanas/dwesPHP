<?php
class Jornada extends CI_Controller {
    
    public function r() {
        $this->load->model('Jornada_model');
        $jornadas = $this->Jornada_model->r();
        $datos['jornadas'] = $jornadas;
        frame($this,'jornada/r',$datos);  
    }
    
    public function c() {
        frame($this,'jornada/c');
    }
    
    public function cPost() {
        $numero = isset($_POST['numero']) ? $_POST['numero'] : null;
        $ini= isset($_POST['ini']) ? $_POST['ini'] : null;
        $fin = isset($_POST['fin']) ? $_POST['fin'] : null;
        
        $this->load->model('Jornada_model');
        try {
            $this->Jornada_model->c($numero,$ini,$fin);
            header('Location:'.base_url().'jornada/r');
            //prg("$nombre ha sido creado correctamente",'jornada/r');
        }
        catch (Exception $e) {
           prg($e->getMessage() , 'jornada/c', 'danger');
        }
        
    }
    

}