<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class InviteEspace extends CI_Controller {



public function __construct()
 {
 parent::__construct();
  $this->load->model('db_model');
  $this->load->helper('url_helper');
  $this->load->helper('form'); 
 }


 public function afficherAccueil()
 {
 $this->load->view('templates/invite/haut');
 $this->load->view('invite/invite_accueil');
 $this->load->view('templates/invite/bas');
 
 
 }

 public function afficherProfilInvite()
 {
  if (!$_SESSION['username']) {
    unset($_SESSION);
    redirect(base_url()."index.php/actualite/afficher");
    //header("url=".base_url()."index.php/actualite/afficher#MaPageDeConnexion");
}
$SocialMedia["ReseaxSocieux"] = $this->db_model->getSocialMediaForInvite($_SESSION['id_invite']);
$this->load->view('templates/invite/haut');
 $this->load->view('invite/invite_profil',$SocialMedia);
 $this->load->view('templates/invite/bas');
 }

public function afficherModifierProfilInvite()
 {
 

$this->load->view('templates/invite/haut');
 $this->load->view('invite/modifier_profil');
 $this->load->view('templates/invite/bas');
 }


 public function afficherPasspoerAndPosts()
 {
  if (!$_SESSION['username']) {
    unset($_SESSION);
    redirect(base_url()."index.php/actualite/afficher");
    //header("url=".base_url()."index.php/actualite/afficher#MaPageDeConnexion");
}
$PostEtPassport["PassportAndPost"] = $this->db_model->getPostAndPassport($_SESSION['id_invite']);
$this->load->view('templates/invite/haut');
 $this->load->view('invite/pass_post',$PostEtPassport);
 $this->load->view('templates/invite/bas');
 }


 


}
?>