<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Compte extends CI_Controller {


 public function __construct()
 {
 parent::__construct();
 $this->load->model('db_model');
 $this->load->helper('url');
 }

 public function maliste()
 {
 $data['titre'] = 'Liste des pseudos :';
 $data['pseudos'] = $this->db_model->get_all_test();

 $this->load->view('templates/haut');
 $this->load->view('page_accueil');
 $this->load->view('test_compte',$data);
 $this->load->view('templates/bas');
 }

}