<?php
require_once '../App/Libraries/Controller.php';

class Usuarios extends Controller {
    public function login() {
        $this->view('login');
    }

    public function cadastro() {
        $this->view('cadastro');
    }

    public function recuperar() {
        $this->view('recuperar');
    }
    
    // Header
    public function notificacoes() {
        $this->view('notificacoes');
    }
    
    public function usuario() {
        $this->view('usuario');
    }
    
    public function configuracoes() {
        $this->view('configuracoes');
    }

    // Barra lateral <<O "configuracoes" fica tanto no header quanto na barra lateral. Mas só dá pra chamar ele aqui uma vez
    public function home() {
        $this->view('home');
    }
    
    public function materias() {
        $this->view('materias');
    }

    public function notas() {
        $this->view('notas');
    }

    public function calendario() {
        $this->view('calendario');
    }

    public function ajuda() {
        $this->view('ajuda');
    }


}
