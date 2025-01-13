<?php
class Pais extends CI_Controller {
    
    public function r() {
        $this->load->model('Pais_model');
        $paises = $this->Pais_model->r();
        $datos['ps'] = $paises;
        frame($this,'pais/r',$datos);  
    }
    
    public function c() {
        frame($this,'pais/c');
    }
    
    public function cPost() {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $this->load->model('Pais_model');
        try {
            $this->Pais_model->c($nombre);
            header('Location:'.base_url().'pais/r');
            //prg("$nombre ha sido creado correctamente",'pais/r');
        }
        catch (Exception $e) {
           prg($e->getMessage() , 'pais/c', 'danger');
        }
        
    }
    
    public function dPost() {
        $idPais = isset($_POST['idPais']) ? $_POST['idPais'] : null;
        $this->load->model('Pais_model');
        try {
            $this->Pais_model->d($idPais);
            header('Location:'.base_url().'pais/r');
        }
        catch (Exception $e) {
            prg($e->getMessage() , 'pais/r' , 'danger');
        }
    }
    
    public function u() {
        $idPais = isset($_GET['idPais']) ? $_GET['idPais'] : null;
        $this->load->model('Pais_model');
        $data['pais'] = $this->Pais_model->rById($idPais);
        frame($this,'pais/u',$data);
    }
    
    public function uPost() {
        $idPais = isset($_POST['idPais']) ? $_POST['idPais'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $this->load->model('Pais_model');
        try {
            $this->Pais_model->u($idPais,$nombre);
            header('Location:'.base_url().'pais/r');
        }
        catch (Exception $e) {
            prg($e->getMessage(),'pais/u?idPais='.$idPais,'danger');
        }
    }

}