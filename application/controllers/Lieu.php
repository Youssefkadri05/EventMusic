<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lieu extends CI_Controller {

 public function __construct()
 {
 parent::__construct();
 $this->load->model('db_model');
 $this->load->helper('url_helper');
 }
public function afficherLieux()
 {
 
 
 $data['titre'] = 'Lieux & Servicees';
 $data['lieu'] = $this->db_model->get_lieux();
 $data['actu'] = $this->db_model->get_actualite();

 $this->load->view('templates/haut');
 $this->load->view('page_accueil',$data);
 $this->load->view('affiche_lieu',$data);
 $this->load->view('templates/bas');
 
 }
}
?>