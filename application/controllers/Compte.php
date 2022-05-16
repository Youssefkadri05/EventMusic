<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Compte extends CI_Controller {


 public function __construct()
 {
 parent::__construct();
 $this->load->model('db_model');
 $this->load->helper('url_helper');
 $this->load->helper('form');
 }

 public function lister()
 {
 $data['titre'] = 'Liste des pseudos :';
 $data['pseudos'] = $this->db_model->get_all_compte();

 $this->load->view('templates/haut');
 $this->load->view('page_accueil');
 $this->load->view('compte_liste',$data);
 $this->load->view('templates/bas');
 }

public function creer()
 {
 $data['actu'] = $this->db_model->get_actualite();
 $this->load->helper('form');
 $this->load->library('form_validation');
 $this->form_validation->set_rules('id', 'id', 'required');
 $this->form_validation->set_rules('mdp', 'mdp', 'required');
 if ($this->form_validation->run() == FALSE)
 {
 $this->load->view('templates/haut');
 $this->load->view('page_accueil',$data);
 $this->load->view('compte_creer');
 $this->load->view('templates/bas');
 }
 else
 {
 $this->db_model->set_compte();
 $this->load->view('templates/haut');
 $this->load->view('page_accueil',$data);
 $this->load->view('compte_succes');
 $this->load->view('templates/bas');
 }
}

public function connecter()
{
	$data['actu'] = $this->db_model->get_actualite();

	$this->load->helper('form');
	$this->load->library('form_validation');
 	$this->form_validation->set_rules('login', 'login', 'required');
 	$this->form_validation->set_rules('Password', 'Password', 'required');

 	if ($this->form_validation->run() == FALSE)
 	{
 		$this->load->view('templates/haut');
 		//$this->load->view('page_accueil',$data);
 		$this->load->view('compte_connecter');
 		$this->load->view('templates/bas');
 	}
 	else
 	{
 		$salt="myNameIsYoussefAndIwantToHashMyPassword";
 		$username = $this->input->post('login');
 		$password = $this->input->post('Password');
 		$hashedPassword = hash('sha256', $salt.$password);
 		 
 		 //Pour savoir le type de compte qui veut connecter (invite ou admin)
 		$compteConnect['admin'] = $this->db_model->get_Admin($username);
 		$compteConnect['invite'] = $this->db_model->get_Invite($username);

 		
 		if($this->db_model->connect_compte($username,$hashedPassword))
 		{
 			
 			if(isset($compteConnect['admin']))
 			{

 				$session_data = array('username' => $username ,
 									  'id_admin' => $compteConnect['admin']->org_id,
 									  'Nom_admin' => $compteConnect['admin']->org_nom,
 									  'prenom_admin' => $compteConnect['admin']->org_prenom,
 									  'email_admin' => $compteConnect['admin']->org_email,
 									  'etat_admin' => $compteConnect['admin']->org_etat);
 				$this->session->set_userdata($session_data);
 				redirect(base_url()."index.php/AdminEspace/afficherAccueil");
 				//$this->load->view('administrateur/admin_accueil');
 			
 			}
 			elseif (isset($compteConnect['invite'])) {
 				
 				$session_data = array('username' => $username ,
 									  'id_invite' => $compteConnect['invite']->inv_id,
 									  'Nom_invite' => $compteConnect['invite']->inv_nom,
 									  'description_invite' => $compteConnect['invite']->inv_description,
 									  'piographie_invite' => $compteConnect['invite']->inv_piographie,
 									  'photo_invite' => $compteConnect['invite']->inv_photo,
 									  'etat_invite' => $compteConnect['invite']->inv_etat);
 				$this->session->set_userdata($session_data);

 				
 				redirect(base_url()."index.php/InviteEspace/afficherAccueil");
 			}
 			
 			
 			
 			
 		}
 		else
 		{
 			?>
 			<script>
			
  			alert("Identifiants erronés ou inexistants !");
			
			</script>
			<?php
 		 	header("refresh:0;url=".base_url()."index.php/Compte/connecter#MaPageDeConnexion");
 		}
 	}
}



public function deconnecter()
 {
 

	unset($_SESSION);
	session_destroy();
 redirect(base_url()."index.php/actualite/afficher");
 }



public function setPassword()
{
	
	$this->load->helper('form');
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('nom', 'nom', 'required');
 	$this->form_validation->set_rules('prenom', 'prenom', 'required');
 	$this->form_validation->set_rules('email', 'email', 'required');

 	if ($this->form_validation->run() == FALSE)
 	{
 		$this->load->view('administrateur/admin_profil');
 	}
 	else
 	{
 		$salt="myNameIsYoussefAndIwantToHashMyPassword";
 		

 		$nouveau_password = $this->input->post('nouveau_password');
 		$hashedPasswordNouveau = hash('sha256', $salt.$nouveau_password);

 		$password_confirmer = $this->input->post('password_confirmer');
 		$hashedPassword_confirmer = hash('sha256', $salt.$password_confirmer);

 		if (empty($nouveau_password) && empty($password_confirmer)) {
 			
 		
 		
 			?>
 			<script>
				alert("Champs de saisie vides ! ");
			</script>
			<?php
 			header("refresh:0;url=".base_url()."index.php/AdminEspace/afficherModifierProfilAdmin");
 	}
 	 else{

 		
 			if ($hashedPasswordNouveau == $hashedPassword_confirmer) {
 			
 			?>
 		 	<script>
				alert("le mot de passe a été modifier avec succes. ");
			</script>
			<?php
			$this->db_model->SetPasswordCompte($_SESSION['username'],$hashedPasswordNouveau);
			
 		 	header("refresh:0;url=".base_url()."index.php/AdminEspace/afficherModifierProfilAdmin");
 		}
 		 else {
 		 	?>
 		 	<script>
			
  			alert("Confirmation du mot de passe erronée, veuillez réessayer !");
			
			</script>
			<?php
 		 	header("refresh:0;url=".base_url()."index.php/AdminEspace/afficherModifierProfilAdmin");
 		 }
 		

 	}
 }

}


// this function modifie le mot de passe d'un invite
public function setPasswordForInvite()
{
	
	$data['actu'] = $this->db_model->get_actualite();

	$this->load->helper('form');
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('nom', 'nom', 'required');
 	$this->form_validation->set_rules('biographie', 'biographie', 'required');
 	$this->form_validation->set_rules('description', 'description', 'required');

 	if ($this->form_validation->run() == FALSE)
 	{
 		$this->load->view('invite/invite_profil');
 	}
 	else
 	{
 		$salt="myNameIsYoussefAndIwantToHashMyPassword";
 		

 		$nouveau_password = $this->input->post('nouveau_password');
 		$hashedPasswordNouveau = hash('sha256', $salt.$nouveau_password);

 		$password_confirmer = $this->input->post('password_confirmer');
 		$hashedPassword_confirmer = hash('sha256', $salt.$password_confirmer);

 		if (empty($nouveau_password) && empty($password_confirmer)) {
 			
 		
 		
 			?>
 			<script>
				alert("Champs de saisie vides ! ");
			</script>
			<?php
 			header("refresh:0;url=".base_url()."index.php/InviteEspace/afficherModifierProfilInvite");
 	}
 	 else{

 		
 			if ($hashedPasswordNouveau == $hashedPassword_confirmer) {
 			
 			?>
 		 	<script>
				alert("le mot de passe a été modifier avec succes. ");
			</script>
			<?php
			$this->db_model->SetPasswordCompte($_SESSION['username'],$hashedPasswordNouveau);
			
 		 	header("refresh:0;url=".base_url()."index.php/InviteEspace/afficherModifierProfilInvite");
 		}
 		 else {
 		 	?>
 		 	<script>
			
  			alert("Confirmation du mot de passe erronée, veuillez réessayer !");
			
			</script>
			<?php
 		 	header("refresh:0;url=".base_url()."index.php/InviteEspace/afficherModifierProfilInvite");
 		 }
 		

 	}
 }

}
 

}
?>