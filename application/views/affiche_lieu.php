<dir id="MesLieux" class="text-bg"> <span><?php echo $titre;?></span>  </dir>

<br />
<?php

if($lieu != NULL) {
	echo"<table class="."table".">
  <thead>
    <tr>
      <th rowspan='2' style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">Lieux</th>
      <th colspan='2' style='text-align : center;' scope="."col".">Services</th>
      
    </tr>
    <tr>
     <th style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">Intitulé du service</th>
      <th style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">Type du service</th>
      
      </tr>
  </thead>";
  
  $cmptDesId = 0 ;
  
  foreach($lieu as $a){
    $var3x4 = 0 ;
    if (!isset($traite[$a["lie_id"]])){
        $cpt_id=$a["lie_id"];
        $nbActuForAdmin = 0;
        $cmptDesId++;
        
        foreach($lieu as $act){
          if(strcmp($cpt_id,$act["lie_id"])==0){
            $nbActuForAdmin++;
            if ($var3x4==0) {
               echo "<tr>";
               echo "<td id='nbrDesActu" ; echo $cmptDesId; echo "' style='border : 2px solid #dee2e6; color : black;' scope="."col".">";echo $a["lie_nom"];
               echo "<h3>Description</h3>";
               echo "<p>".$a["lie_description"]."</p>";
               echo "</td>";
        
           }
           else 
              echo "<tr>";
          if ($act["ser_nom"] == NULL) {
              echo "<td style='border : 2px solid #dee2e6; text-align : center; border-right-color: transparent;' scope="."col".">"; echo "</td>";
             echo "<td style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">"; echo"Aucun service";  echo "</td>";
            }
            else{
          echo "<td style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">";  echo $act["ser_nom"];  echo "</td>";
          echo "<td style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">";  echo $act["ser_type"];  echo "</td>";
          }
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
      $traite[$a["lie_id"]]=1;
      
    }
  }
  echo "</table>";
}

else {
    echo "<br /> ";
    ?>
    <div class="pasDeResultat">Aucun lieu/service pour le moment !</div>
    <?php
}
?>
