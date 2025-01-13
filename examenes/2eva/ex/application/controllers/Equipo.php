<?php
class Equipo extends CI_Controller {
    
    public function r() {
        $this->load->model('Equipo_model');
        $equipos = $this->Equipo_model->r();
        $datos['equipos'] = $equipos;
        frame($this,'equipo/r',$datos);  
    }
    
    public function c() {
        frame($this,'equipo/c');
    }
    
    public function cPost() {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $this->load->model('Equipo_model');
        try {
            $this->Equipo_model->c($nombre);
            header('Location:'.base_url().'equipo/r');
            //prg("$nombre ha sido creado correctamente",'equipo/r');
        }
        catch (Exception $e) {
           prg($e->getMessage() , 'equipo/c', 'danger');
        }
        
    }
    

}