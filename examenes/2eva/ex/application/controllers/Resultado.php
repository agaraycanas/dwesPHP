<?php
class Resultado extends CI_Controller {
    
    public function c() {
        $this->load->model('Jornada_model');
        $this->load->model('Equipo_model');
        $data['jornadas'] = $this->Jornada_model->r();
        $data['equipos'] = $this->Equipo_model->r();
        frame($this,'resultado/c',$data);
    }
    
    public function cPost() {
        $idJornada= isset($_POST['idJornada']) ? $_POST['idJornada'] : null;
        $idEquipoLocal = isset($_POST['idEquipoLocal']) ? $_POST['idEquipoLocal'] : null;
        $idEquipoVisitante = isset($_POST['idEquipoVisitante']) ? $_POST['idEquipoVisitante'] : null;
        $gl = isset($_POST['gl']) ? $_POST['gl'] : null;
        $gv = isset($_POST['gv']) ? $_POST['gv'] : null;
        
        $this->load->model('Resultado_model');
        $this->Resultado_model->c($idJornada,$idEquipoLocal,$idEquipoVisitante,$gl,$gv);
        prg('Resultado registrado');
    }

    public function listar() {
        $j = isset($_GET['j']) ? $_GET['j'] : null;
        
        $this->load->model('Jornada_model');
        $data['resultados'] = $this->Jornada_model->getResultadosByNumero($j);
        $data['jornada'] = $j;
        frame($this,'resultado/r',$data);
    }
}