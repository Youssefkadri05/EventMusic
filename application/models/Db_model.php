<?php
class Db_model extends CI_Model {
 public function __construct()
 {
 $this->load->database();
 $this->load->helper('url');

 }
																						/** Partie Accueil */
 	public function get_all_compte()
	{
		$query = $this->db->query("SELECT cmpt_login FROM t_compte_cmpt;");
		return $query->result_array();
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function get_lieux()
	{
		$query = $this->db->query("SELECT * FROM t_service_ser RIGHT JOIN t_lieu_lie USING(lie_id) ");
		return $query->result_array();
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function get_actualite()
	{
		$query = $this->db->query("SELECT * FROM t_Actualite_act LEFT JOIN t_organisateur_org USING(org_id) where act_Etat='A' order by act_DatePublication desc limit 5; ");
		return $query->result_array();
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	public function get_animation()
	{
		$query = $this->db->query("SELECT inv_id,ani_id,ani_libelle,ani_dateDebut,ani_dateFin,lie_nom,inv_nom,ani_description
    	FROM t_animation_ani
    	LEFT JOIN t_invite_animation USING (ani_id)
   		LEFT JOIN t_invite_inv USING (inv_id)
  		LEFT JOIN t_lieu_lie USING (lie_id) where ani_Etat='A' order by ani_dateDebut ;");
		return $query->result_array();
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function getOneAnimation($IdAnimation)
	{
	
 	$req="SELECT * FROM View_ListeDesAnimation  WHERE ani_id =".$IdAnimation.";";
 	$query = $this->db->query($req);
 	return $query->result_array();
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function get_invites()
	{
		$query = $this->db->query("SELECT res_id,pos_texte,pos_id ,inv_id, inv_nom,inv_photo , res_libelle , res_url FROM t_post_pos LEFT JOIN t_passeport_pas USING (pas_id) RIGHT JOIN t_invite_inv USING (inv_id) LEFT JOIN t_invit_reseau USING(inv_id) LEFT JOIN t_reseauxSociaux_res USING(res_id) order by pos_datePost desc;");
		return $query->result_array();
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function AddPost($IDpass,$Message)
	{
		$this->load->helper('url');
 		$req='INSERT INTO t_post_pos (pos_id, pos_libelle, pos_texte, pos_datePost, pos_etat, pas_id) VALUES (NULL, "", "'.$Message.'", NOW(), '."'A'".', "'.$IDpass.'");';
 		$query = $this->db->query($req);
 		return ($query);
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
																					/** Partie des Comptes */
	
	public function set_compte()
	{
 		$this->load->helper('url');
 		$id=$this->input->post('id');
 		$mdp=$this->input->post('mdp');
 		$req="INSERT INTO t_compte_cmpt VALUES ('".$id."','".$mdp."','A');";
 		$query = $this->db->query($req);
 		return ($query);
	}

	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function connect_compte($username, $password)
	{
 		$query =$this->db->query("SELECT cmpt_login,cmpt_password FROM t_compte_cmpt WHERE cmpt_login='".$username."'
		AND cmpt_password='".$password."' AND cmpt_status = 'A';");
 		if($query->num_rows() > 0)
 		{
 			return true;
		}
 		else
 		{
 			return false;
 		}
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	public function get_Invite($username)
	{
 		$query =$this->db->query("SELECT * FROM t_invite_inv WHERE cmpt_login='".$username."';");
 		return $query->row();
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function get_Admin($username)
	{
 		$query =$this->db->query("SELECT * FROM t_organisateur_org WHERE cmpt_login='".$username."';");
		 return $query->row();
	}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	public function SetPasswordCompte($username , $motDePasse)
	{
		$this->load->helper('url');
 	
 		$req=" UPDATE t_compte_cmpt SET cmpt_password='".$motDePasse."' WHERE cmpt_login='".$username."';";
 		$query = $this->db->query($req);
 		return ($query);
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
																						/** Partie Invite */
 	// returne la liste des réseauw socieuw d'un invités a prtir de son id 
	public function getSocialMediaForInvite($IdInvite)
	{
	
 	$req="CALL ListeSocialMedia(".$IdInvite.");";
 	$query = $this->db->query($req);
 	return $query->result_array();
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function getPostAndPassport($IdInvite)
	{
		$req="CALL postDunPassportDunInvite(".$IdInvite.");";
 		$query = $this->db->query($req);
 		return $query->result_array();
	}

	
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	public function getIdentifiantsPost($IDpass, $passPassword)
	{
		$this->load->helper('url');
 		$query =$this->db->query("SELECT pas_id,pas_passmdb FROM t_passeport_pas WHERE pas_id='".$IDpass."'
		AND pas_passmdb='".$passPassword."';");
 		if($query->num_rows() > 0)
 		{
 			return true;
 		}
 		else
 		{
 			return false;
 		}
	}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------																						/** Partie admin */

	public function DeleteOneAnimation($idAnimation)
	{
		$this->load->helper('url');
 	
 		$req=" delete from t_invite_animation where ani_id= ".$idAnimation.";";
 		$query = $this->db->query($req);

 		$req1=" delete from t_animation_ani where ani_id= ".$idAnimation.";";
 		$query1 = $this->db->query($req1);

 		return ($query1);
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	public function getNbrParticipant ()
	{
		$query =$this->db->query("SELECT NombreParticipants() AS NombreParticipants ;");
 		return $query->row();
	}


}
?>