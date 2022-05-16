<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Actualite extends CI_Controller {

 public function __construct()
 {
 parent::__construct();
 $this->load->model('db_model');
 $this->load->helper('url_helper');
 }
public function afficher()
 {
 
 
 $data['titre'] = 'Actualités';
 $data['actu'] = $this->db_model->get_actualite();

 $this->load->view('templates/haut');
 $this->load->view('page_accueil',$data);
 $this->load->view('actualite_afficher',$data);
 $this->load->view('templates/bas');
 
 }
}
?>