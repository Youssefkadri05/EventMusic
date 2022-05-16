<dir id="MesActualites" class="text-bg"> <span><?php echo $titre;?></span>  </dir>

<br />
<?php

if($actu != NULL) {
	echo"<table class="."table".">
  <thead>
    <tr>
      <th rowspan='2' style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">Pseudo</th>
      <th colspan='3' style='text-align : center;' scope="."col".">Actualités</th>
      
    </tr>
    <tr>
     <th style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">Intitulé</th>
      <th style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">Description</th>
      <th style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">Date de début</th>
      </tr>
  </thead>";
  
  $cmptDesId = 0 ;
  
  foreach($actu as $a){
    $var3x4 = 0 ;
    if (!isset($traite[$a["org_id"]])){
        $cpt_id=$a["org_id"];
        $nbActuForAdmin = 0;
        $cmptDesId++;
        
        foreach($actu as $act){
          if(strcmp($cpt_id,$act["org_id"])==0){
            $nbActuForAdmin++;
            if ($var3x4==0) {
               echo "<tr>";
               echo "<td id='nbrDesActu" ; echo $cmptDesId; echo "' style='border : 2px solid #dee2e6; color : black;' scope="."col".">";echo $a["org_nom"];
               echo "</td>";
        
           }
           else 
              echo "<tr>";

          echo "<td style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">";  echo $act["act_Libelle"];  echo "</td>";
          echo "<td style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">";  echo $act["act_Description"];  echo "</td>";
          echo "<td style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">";  echo $act["act_DatePublication"];  echo "</td>";
          echo "</tr>";
          $var3x4=1;
        
        }
        
      }
      ?>
      <script>
              var variableRecuperee = <?php echo json_encode($nbActuForAdmin); ?> ;
              document.getElementById("nbrDesActu<?php echo json_encode($cmptDesId); ?>").rowSpan = variableRecuperee ;
      </script>
      
      <?php
      $traite[$a["org_id"]]=1;
      
    }
  }
  echo "</table>";
}

else {
    echo "<br /> ";
    ?>
    <div class="pasDeResultat">Aucune actualités pour l'instant !</div>
    <?php
}
?>
<a href='<?php echo base_url() ; echo"index.php/Accueil/afficher_page_ajouter_post"; ?>' ><img src=<?php echo base_url();  echo "style/images/plus_50px.png" ; ?> alt=# /></a>
