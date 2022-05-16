<div class="container marketing" id="FormDajoutDunPost">
  <?php if(validation_errors()) { ?> 
            <script> alert("Veuillez remplir tous les champs!"); </script> 
          <?php header("refresh:0;url=".base_url()."index.php/Accueil/ajouter_post#FormDajoutDunPost"); } ?>
          <?php echo form_open('Accueil/ajouter_post'); ?>
  <div class="form-group">
    <label for="exampleFormControlInput1">Id de passport</label>
    <input type="text" class="form-control" name="IDpass" id="exampleFormControlInput1" placeholder="Id de passport">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Mot de passe</label>
    <input type="password" class="form-control" name="PasswordPass" id="exampleFormControlInput1" >
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea maxlength="140" class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
  </div>
  <input type="submit"  class="btn btn-primary m-t-15 waves-effect" value="Valider">
  <a href="<?php echo base_url();?>index.php/actualite/afficher">
                                     <input  type="button" class="btn btn-primary m-t-15 waves-effect" value="Annuler" style="background-color: red !important;">
                                </a>
</form>
</div>