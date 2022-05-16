<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invite extends CI_Controller {

 public function __construct()
 {
 parent::__construct();
 $this->load->model('db_model');
 $this->load->helper('url_helper');
 }
public function afficherInvites()
 {
 
 
 $data['titre'] = 'Invites';
 $data['invit'] = $this->db_model->get_invites();
 $data['actu'] =$this->db_model->get_actualite();



 $this->load->view('templates/haut');
 $this->load->view('page_accueil',$data);
 $this->load->view('invite_affiche',$data);
 $this->load->view('templates/bas');
 
 }
}
?>