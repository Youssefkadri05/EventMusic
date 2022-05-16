<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {
 


	public function __construct()
 {
 parent::__construct();
  $this->load->model('db_model');
 $this->load->helper('url');
 $this->load->helper('form');
 }


 public function afficher()
 {
  $data['titre'] = 'Actualités';
 $data['actu'] = $this->db_model->get_actualite();
 // Chargement des 3 vues pour créer la page Web d’accueil
 $this->load->view('templates/haut');
 $this->load->view('page_accueil',$data);
 $this->load->view('actualite_afficher',$data);
 $this->load->view('templates/bas');
 }


 public function afficher_page_ajouter_post()
 {
  $data['titre'] = 'Actualités';
 $data['actu'] = $this->db_model->get_actualite();
 // Chargement des 3 vues pour créer la page Web d’accueil
 $this->load->view('templates/haut');
 $this->load->view('page_accueil',$data);
 $this->load->view('ajouter_post');
 $this->load->view('templates/bas');
 }

 public function ajouter_post()
 {
  $data['titre'] = 'Actualités';
 $data['actu'] = $this->db_model->get_actualite();
 	$this->load->helper('form');
	$this->load->library('form_validation');
 	$this->form_validation->set_rules('IDpass', 'IDpass', 'required');
 	$this->form_validation->set_rules('PasswordPass', 'PasswordPass', 'required');
 	$this->form_validation->set_rules('message', 'message', 'required');
 
 if ($this->form_validation->run() == FALSE)
 	{
 		$this->load->view('templates/haut');
 		$this->load->view('page_accueil',$data);
 		$this->load->view('ajouter_post');
 		$this->load->view('templates/bas');
 	}
 	else
 	{
 		
 		$IDdePass = $this->input->post('IDpass');
 		$PasswordDePasse = $this->input->post('PasswordPass');
 		$Message = $this->input->post('message');
 		

 		
 		if($this->db_model->getIdentifiantsPost($IDdePass,$PasswordDePasse))
 		{
 			
 			
 			$this->db_model->AddPost($IDdePass,$Message);
 			?>
 			<script>
			
  			alert("Post ajouté avec succes !");
			
			</script>
			<?php
 		 	header("refresh:0;url=".base_url()."index.php/Accueil/afficher");
 			
 		}
 		else
 		{
 			?>
 			<script>
			
  			alert("Code(s) erroné(s), aucun passeport trouvé !");
			
			</script>
			<?php
 		 	header("refresh:0;url=".base_url()."index.php/Accueil/afficher_page_ajouter_post#FormDajoutDunPost");
 		}
 	}
 }

}
?>