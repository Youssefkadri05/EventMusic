
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW TASKS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW TICKETS</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW COMMENTS</div>
                            <?php $participants=$NBrDeparticipants->NombreParticipants ;  ?>
                            <div class="number count-to" data-from="0" data-to="256" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">N° des participants</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $participants; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
             <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        
                        <dir class="text-bg" id="MonProgrammation"></dir>

<br />






<?php
$date = new DateTime('now');
$cmpt_passe=0;
$cmpt_encore=0;
$cmpt_avenir=0;
if ($anim != NULL){
?>
<table class="table">

  <thead>
    <tr>
      <th scope="col">Lieu</th>
      <th scope="col">Intitulé</th>
      <th scope="col">Description</th>
      <th scope="col">Date de debut</th>
      <th scope="col">Date de fin</th>
      <th scope="col">Invités</th>
      <th scope="col"></th>
    </tr>
      
    
 <tbody>

<?php
// Boucle de parcours de toutes les lignes du résultat obtenu
foreach($anim as $a){
// Affichage d’une ligne de tableau pour un pseudo non encore traité

if (!isset($traite[$a["ani_id"]])){
$cpt_id=$a["ani_id"];

$date_debut = $a["ani_dateDebut"] ;
$date_fin = $a["ani_dateFin"] ;
$dateMaintenant = new DateTime("now");
$dateDeDebut = new DateTime($date_debut);
$dateDeFin = new DateTime($date_fin);

if ($dateMaintenant > $dateDeFin ) {
  if ($cmpt_passe==0) {
   ?>
     <tr>
          <th style='text-align:center ; background-color :#00FFFF;' colspan=7  scope="col">Animations Passés</th>
     </tr>
    <?php
   $cmpt_passe=1; 
  }
}
elseif ($dateMaintenant < $dateDeDebut) {
    if ($cmpt_avenir==0) {
   ?>
     <tr>
          <th style='text-align:center ; background-color :#00FFFF;' colspan=7  scope="col">Animations à Avenir</th>
     </tr>
    <?php
   $cmpt_avenir=1; 
  }
}
elseif($dateMaintenant > $dateDeDebut && $dateMaintenant < $dateDeFin){
    if ($cmpt_encore==0) {
   ?>
     <tr>
          <th style='text-align:center ; background-color :#00FFFF;' colspan=7  scope="col">Animations en cours</th>
     </tr>
    <?php
   $cmpt_encore=1; 
  }
}
echo "<tr>";
    echo '<th scope="row">';echo $a["lie_nom"];echo "<a href="."'#'"."><img src='"; echo base_url(); echo "style/icon/place_marker_40px.png'"."alt="."#"." /></a></th>";
    echo "<td>";echo $a["ani_libelle"];echo "</td>";
    echo "<td>";echo $a["ani_description"];echo "</td>";
    echo "<td>";echo $a["ani_dateDebut"];echo "</td>";
    echo "<td>";echo $a["ani_dateFin"];echo "</td>";
    echo "<td>";
      // Boucle d’affichage des animalités liées au pseudo
      foreach($anim as $MyAni){
      echo "<ul style="."list-style-type:square".">";
      if(strcmp($cpt_id,$MyAni["ani_id"])==0){
      echo "<li>";
      if ($MyAni["inv_nom"]==NULL) {
        echo "<img src='"; echo base_url(); echo "style/icon/oops_40px.png'"."alt="."# />";
        echo "<br>Pas des invités pour l'instant";
      }
      else {
        echo "‣".$MyAni["inv_nom"];}
        
      echo "</li>";
      }
      echo "</ul>";
      }
  echo "</td>";
  echo "<td>"; 
          echo"
                           <div class="."col-xl-12 col-lg-12 col-md-12 col-sm-12 ".">
                           <ul> 
                            <li><a href="."'#'".""; ?> onclick='confirme_animation(<?php echo json_encode($a["ani_id"]); ?>);'> <?php echo "<img src='"; echo base_url(); echo "style/icon/delete_bin_100px.png'"."alt="."#"." /></a></li>
                            <li><a href="."'#'"."><img src='"; echo base_url(); echo "style/icon/edit_100px.png'"."alt="."#"." /></a></li>
                            

                            
                          </ul>
                          </div>
          ";

  echo "</td>";
// Conservation du traitement du pseudo
// (dans un tableau associatif dans cet exemple !)

$traite[$a["ani_id"]]=1;

echo "</tr>";
}
}
}
else {
echo "<br /> ";
?>
<div class="pasDeResultat">Aucune animation pour l'instant !</div>
<?php
}
?>
 </tbody>
</table>






                    </div>
                    <input type="submit"  class="btn btn-primary m-t-15 waves-effect" style="margin-left: 45%;" value="Ajouter une animation">
                </div>
            </div>
            <!-- #END# CPU Usage -->
            </div>
