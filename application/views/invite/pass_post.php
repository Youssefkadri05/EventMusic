
<dir id="MesPost" class="text-bg"> <span>Mes passport & ses posts</span>  </dir>

<br />
<?php

if($PassportAndPost != NULL) {
	echo"<table class="."table".">
  <thead>
    <tr>
      <th rowspan='2' style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">Mes Passports</th>
      <th colspan='3' style='text-align : center;' scope="."col".">Ses Posts</th>
      
    </tr>
    <tr>
     <th style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">Intitulé</th>
      <th style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">Description</th>
      <th style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">Date de publication</th>
      </tr>
  </thead>";
  
  $cmptDesId = 0 ;
  
  foreach($PassportAndPost as $a){
    $var3x4 = 0 ;
    if (!isset($traite[$a["pas_id"]])){
        $cpt_id=$a["pas_id"];
        $nbActuForAdmin = 0;
        $cmptDesId++;
        
        foreach($PassportAndPost as $act){
          if(strcmp($cpt_id,$act["pas_id"])==0){
            $nbActuForAdmin++;
            if ($var3x4==0) {
               echo "<tr>";
               echo "<td id='nbrDesActu" ; echo $cmptDesId; echo "' style='border : 2px solid #dee2e6; color : black;' scope="."col".">";echo $a["pas_id"];
               echo "</td>";
        
           }
           else 
              echo "<tr>";
            if ($act["pos_id"] == NULL) {
              echo "<td style='border : 2px solid #dee2e6; text-align : center; border-right-color: transparent;' scope="."col".">"; echo "</td>";
             echo "<td style='border : 2px solid #dee2e6; text-align : center; border-right-color: transparent; color : red ;' scope="."col".">";  echo "Pas des posts pour ce passport";  echo "</td>";
             echo "<td style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">";  echo "</td>";
            }
            else{
          echo "<td style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">";  echo $act["pos_libelle"];  echo "</td>";
          echo "<td style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">";  echo $act["pos_texte"];  echo "</td>";
          echo "<td style='border : 2px solid #dee2e6; text-align : center;' scope="."col".">";  echo $act["pos_datePost"];  echo "</td>";
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
      $traite[$a["pas_id"]]=1;
      
    }
  }
  echo "</table>";
}

else {
    echo "<br /> ";
    ?>
    <div class="pasDeResultat">Aucun passeport!</div>
    <?php
}
?>
