<?php
class Persona extends CI_Controller {
    public function r() {
        $this->load->model('Persona_model');
        $datos [ 'personas' ] = $this->Persona_model->r();
        frame( $this, 'persona/r' , $datos);
    }
    
    public function index() {
        $this->r();
    }
    
    public function c() {
        $this->load->model('Pais_model');
        $this->load->model('Aficion_model');
        
        $d['paises'] = $this->Pais_model->r();
        $d['aficiones'] = $this->Aficion_model->r();
        
        frame($this, 'persona/c',$d);
    }
    
    public function cPost() {
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
        $apellido = isset($_POST['apellido'])?$_POST['apellido']:null;
        $pwd = isset($_POST['pwd'])?$_POST['pwd']:null;
        $idPaisNace = isset($_POST['idPaisNace'])?$_POST['idPaisNace']:null;
        $idPaisVive = isset($_POST['idPaisVive'])?$_POST['idPaisVive']:null;
        $idsAficionGusta = isset($_POST['idAficionGusta'])?$_POST['idAficionGusta']:[];
        $idsAficionOdia = isset($_POST['idAficionOdia'])?$_POST['idAficionOdia']:[];
        
        $this->load->model('Persona_model');
        $this->Persona_model->c($nombre,$apellido,$pwd,$idPaisNace,$idPaisVive,$idsAficionGusta,$idsAficionOdia);
        header('Location:'.base_url().'persona/r');
    }
    
    public function dPost() {
        $id = isset($_POST['idPersona']) ? $_POST['idPersona'] : null;
        $this->load->model('Persona_model');
        $this->Persona_model->d($id);
        header('Location:'.base_url().'persona/r');
    }

    public function u() {
        $id = isset($_GET['idPersona'])?$_GET['idPersona']:null;
        
        $this->load->model('Persona_model');
        $this->load->model('Pais_model');
        $this->load->model('Aficion_model');
        
        $data['persona'] = $this->Persona_model->rById($id);
        $data['paises'] = $this->Pais_model->r();
        $data['aficiones'] = $this->Aficion_model->r();
        
        frame($this,'persona/u',$data);
    }
    
    public function uPost() {
        $idPersona = isset($_POST['idPersona'])?$_POST['idPersona']:null;
        $nombre = isset($_POST['nombre'])?$_POST['nombre']:null;
        $apellido = isset($_POST['apellido'])?$_POST['apellido']:null;
        $idPaisNace = isset($_POST['idPaisNace'])?$_POST['idPaisNace']:null;
        $idPaisVive = isset($_POST['idPaisVive'])?$_POST['idPaisVive']:null;
        $idsAficionGusta = isset($_POST['idAficionGusta'])?$_POST['idAficionGusta']:[];
        $idsAficionOdia = isset($_POST['idAficionOdia'])?$_POST['idAficionOdia']:[];
        
        $this->load->model('Persona_model');
        $this->Persona_model->u($idPersona,$nombre,$apellido,$idPaisNace,$idPaisVive,$idsAficionGusta,$idsAficionOdia);
        header('Location:'.base_url().'persona/r');
    }

    public function login(){
        frame($this,'persona/login');
    }
    
    public function loginPost() {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $pwd = isset($_POST['pwd']) ? $_POST['pwd'] : null;
        $this->load->model('Persona_model');
        try {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['persona'] = $this->Persona_model->comprobarLogin($nombre,$pwd);
            header('Location:'.base_url());
        }
        catch (Exception $e) {
            prg($e->getMessage(),'','danger');
        }
    }
    
    public function logoutPost() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location:'.base_url());
    }
}
?>