<?php
class Aficion extends CI_Controller {
    public function r() {
        $this->load->model('Aficion_model');
        $datos [ 'aficiones' ] = $this->Aficion_model->r(); 
        frame( $this, 'aficion/r' , $datos);
    }
    
    public function index() {
        $this->r();
    }
    
    public function c() {
        frame($this, 'aficion/c');
    }
    
    public function cPost() {
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
        $this->load->model('Aficion_model');
        try {
            $this->Aficion_model->c($nombre);
            header('Location:'.base_url().'aficion/r');
        }
        catch (Exception $e) {
            prg($e->getMessage(),'aficion/c','danger');
        }
        
    }
   
    public function dPost() {
        $idAficion = isset($_POST['idAficion']) ? $_POST['idAficion'] : null;
        $this->load->model('Aficion_model');
        try {
            $this->Aficion_model->d($idAficion);
            header('Location:'.base_url().'aficion/r');
        }
        catch (Exception $e) {
            prg($e->getMessage() , 'aficion/r' , 'danger');
        }
    }
    
    
    public function u() {
        $idAficion= isset($_GET['idAficion']) ? $_GET['idAficion'] : null;
        $this->load->model('Aficion_model');
        $data['aficion'] = $this->Aficion_model->rById($idAficion);
        frame($this,'aficion/u',$data);
    }
    
    public function uPost() {
        $idAficion= isset($_POST['idAficion']) ? $_POST['idAficion'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $this->load->model('Aficion_model');
        try {
            $this->Aficion_model->u($idAficion,$nombre);
            header('Location:'.base_url().'aficion/r');
        }
        catch (Exception $e) {
            prg($e->getMessage(),'aficion/u?idAficion='.$idAficion,'danger');
        }
    }
    
}
?>