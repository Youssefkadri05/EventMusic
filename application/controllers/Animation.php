<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Animation extends CI_Controller {

 public function __construct()
 {
 parent::__construct();
 $this->load->model('db_model');
 $this->load->helper('url_helper');
 }
public function afficherAnimations()
 {
 
 
 $data['titre'] = 'Animations';
 $data['anim'] = $this->db_model->get_animation();
 $data['actu'] =$this->db_model->get_actualite();



 $this->load->view('templates/haut');
 $this->load->view('page_accueil',$data);
 $this->load->view('animation_afficher',$data);
 $this->load->view('templates/bas');
 
 }


public function afficherDetailAnimation($IdAnimation =FALSE)
 {
 
 
 $data['titre'] = 'Animations';
 $data['anim'] = $this->db_model->getOneAnimation($IdAnimation);
 $data['actu'] =$this->db_model->get_actualite();



 $this->load->view('templates/haut');
 $this->load->view('page_accueil',$data);
 $this->load->view('detail_animation',$data);
 $this->load->view('templates/bas');
 
 }


}
?>