<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEspace extends CI_Controller {
 


	public function __construct()
 {
 parent::__construct();
  $this->load->model('db_model');
  $this->load->helper('url_helper');
  $this->load->helper('form'); 
 }


 public function afficherAccueil()
 {
  $data['anim'] = $this->db_model->get_animation();
  $data['NBrDeparticipants'] = $this->db_model->getNbrParticipant();
 $this->load->view('templates/administrateur/haut');
 $this->load->view('administrateur/admin_accueil',$data);
 $this->load->view('templates/administrateur/bas');
 
 
 }

 public function afficherProfilAdmin()
 {
 

$this->load->view('templates/administrateur/haut');
 $this->load->view('administrateur/admin_profil');
 $this->load->view('templates/administrateur/bas');
 }

public function afficherModifierProfilAdmin()
 {
 

$this->load->view('templates/administrateur/haut');
 $this->load->view('administrateur/modifier_profil');
 $this->load->view('templates/administrateur/bas');
 }

 public function SupprimerAnimation($idAnimation)
 {
 	$data['deleted'] = $this->db_model->DeleteOneAnimation($idAnimation);
 	$data['NBrDeparticipants'] = $this->db_model->getNbrParticipant();
 	$data['anim'] = $this->db_model->get_animation();
 $this->load->view('templates/administrateur/haut');
 $this->load->view('administrateur/admin_accueil',$data);
 $this->load->view('templates/administrateur/bas');


 }

}
?>